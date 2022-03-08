<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Pages\Banner;
use App\Models\Pages\Head;
use App\Models\Pages\Pages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Yoeunes\Toastr\Toastr;

use function Ramsey\Uuid\v1;

class PageController extends Controller
{

    public function list(){
        // array_keys()
        $list = Pages::all();
        return view('Page.partials.list',compact('list',$list));
    }

    //get all data of pages table
    public function getData_pages(){
        $data = Pages::all();
        return $data;
    }

    public function add_page_view(){
        return view('Page.partials.add_page');
    }

    public function add_page(Request $req){
        $page_name = $req->name;
        $page_url = $req->url;
        $page_enabled = $req->enabled;
        $page = Pages::create([
            'name' => $page_name,
            'url_code' => $page_url,
            'enabled' => $page_enabled
        ]);
        toastr('Thêm trang thành công','success');
        return redirect()->route('admin_page_list');
    }

    //show the view of page edit and merge data to view
    public function edit($id){
        $data = Pages::join('la_banner','la_pages.id','=','la_banner.page_id')
        ->where(['la_pages.id' => $id,'la_banner.page_id' => $id])
        ->select('la_pages.*','la_banner.id as banner_id','la_banner.title as banner_title',
        'la_banner.subtitle as banner_subtitle','la_banner.photo as banner_photo',
        'la_banner.created_at as banner_created')->get();

        $page_overview_tabs = Pages::find($id);

        $banner_tabs =  DB::table('la_banner')->join('la_pages','la_banner.page_id','=','la_pages.id')
        ->where(['la_banner.page_id' => $id])->select('la_banner.*','la_pages.name as page_name')->get();

        $banner = DB::table('la_banner')->get();
        $get_selected_page = DB::table('la_banner')->join('la_pages','la_banner.page_id','=','la_pages.id')
        ->where(['la_banner.page_id' => $id])->select('la_banner.*','la_pages.name as page_name')->first();

        $else_selected_page = DB::table('la_pages')->where('id','!=',$id)->get();

        return view('Page.partials.edit',compact('data',
        'banner','get_selected_page',
        'else_selected_page','page_overview_tabs'));
    }

    public function save(Request $req){
        if($req->isMethod('post')){
            if(isset($req->page_id)){
                //request post - page value
                $page = Pages::find($req->page_id);
                $page->name = $req->page_name;
                $page->url_code = $req->page_code;
                $page->enabled = $req->page_enabled;
                $page->save();
                toastr('Lưu thành công!','success');
                // toastr()->remove();
            }

            if(isset($req->banner_id_value)){ // != 0
                //request post - banner value
                $banner = Banner::find($req->banner_id_value);
                $banner->page_id = $req->choose_page_id_banner;
                $banner->title = $req->slide_title;
                $banner->subtitle = $req->slide_subtitle;
                $banner->enabled = $req->slide_enabled;
                $photoName = "";
                $time = "";
                if($req->hasFile('slide_photo')){
                    $photo = $req->file('slide_photo');
                    $photoName = $photo->getClientOriginalName();
                    $time = time();
                    $photoOld = $banner->photo;

                    if(file_exists(public_path(config('pages_value.admin_url_storage_folder') . $photoOld))){
                        unlink(public_path(config('pages_value.admin_url_storage_folder')) . $photoOld);
                    }
                    $save_photo =  Storage::disk('public')->put('uploads/' . $time . "-" . $photoName,File::get($req->file('slide_photo')));
                }
                else{
                    $time = time();
                    $photoName = "default.png";
                }
                $banner->photo = time() . "-" . $photoName;
                $banner->save();
                toastr('Lưu thành công','success');
            }

            if(isset($req->head_value_id)){ // != 0
                //request post - head value
                $head = Head::find($req->head_value_id);
                $head->page_id = $req->choose_page_id_head;
                $head->title = $req->head_title;
                $head->content = $req->head_content;
                $head->enabled = $req->head_enabled;
                $head->save();
                toastr('Lưu thành công','success');

            }
        }
        return redirect()->route('admin_page_list_id',['id' => $req->page_id]);
    }

    public function delete_page($page_id){
        $page = Pages::find($page_id)->delete();
        toastr('Xóa thành công','success');
        return redirect()->route('admin_page_list');
    }

    //show list of banner at admin-page-list/{id}
    public function show_slide_of_banner(Request $req_banner_id){//req sẽ nhận id từ ajax (tabs-banner.js)
        $this->banner_id = $req_banner_id->id;
        //3 dòng dưới thực hiện lấy page list/id hiện tại
        $getURLPrev = url()->previous();
        $indexID = strrpos($getURLPrev,'/');
        $valueID_urlPev = substr($getURLPrev,$indexID + 1);

        $html_option_slide =
        ' <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">View at</h4>
                        <input type="hidden" id="banner_id_value" name="banner_id_value" value="">
                        <select name="choose_page_id_banner" class="form-control">
                            '.$this->html_choose_option_correct_banner($valueID_urlPev,$this->get_selected_page_option_banner($valueID_urlPev)).'
                            '.$this->html_option_else_page($valueID_urlPev).'
                        </select>
                    </div>
                </div>
            </div>
            '.$this->html_option_enabled_slide($valueID_urlPev).'
        ';

        $result = $html_option_slide . $this->html_title_slide($req_banner_id->id)
        . $this->html_subtitle_slide($req_banner_id->id) .  $this->html_photo_slide($req_banner_id->id);

        return $result;
    }

    //show list of head at admin-page-list/{id}
    public function show_head(Request $req_head_id){//req sẽ nhận id từ ajax (tabs-head.js)
        //3 dòng dưới thực hiện lấy page list/id hiện tại
        $getURLPrev = url()->previous();
        $indexID = strrpos($getURLPrev,'/');
        $valueID_urlPev = substr($getURLPrev,$indexID + 1);

        $html_head_slide =
        ' <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">View at</h4>
                        <input type="hidden" id="head_value_id" name="head_value_id" value="" >
                        <select name="choose_page_id_head" class="form-control">
                            '.$this->html_choose_option_correct_head($valueID_urlPev,$this->get_selected_page_option_head($valueID_urlPev)).'
                            '.$this->html_option_else_page($valueID_urlPev).'
                        </select>
                    </div>
                </div>
            </div>
            '.$this->html_option_enabled_head($valueID_urlPev).'
        ';

        $result = $html_head_slide
        . $this->html_title_head($req_head_id->id) . $this->html_content_head($req_head_id->id);
        return $result;
    }

    public function html_title_head($head_id){
        $html_title_head =
            '<div class="row">
                <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Title</h4>
                                <textarea cols="80" name="head_title" id="page_editor_title_head">
                                '.$this->getData_head_by_id($head_id)[0]->title.'
                                </textarea>
                            </div>
                        </div>
                </div>
            ';
        return $html_title_head;
    }

    public function html_content_head($head_id){
        $html_content_slide = '
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Content</h4>
                        <textarea cols="80" name="head_content" id="page_editor_content_head">
                            '.$this->getData_head_by_id($head_id)[0]->content.'
                        </textarea>
                    </div>
                </div>
            </div>';
        return $html_content_slide;
    }

    public function html_photo_slide($banner_id){
        $html_photo_slide =
            '<div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Photo</h4>
                            <input name="slide_photo" type="file">
                            <img  src="' .config('pages_value.admin_url_storage_folder') . $this->getData_banner_by_id($banner_id)[0]->photo
                            .'" alt='.$this->getData_banner_by_id($banner_id)[0]->photo.'>
                        </div>
                    </div>
            </div>
        </div>';
        return $html_photo_slide;
    }

    public function html_title_slide($banner_id)
    {
        $html_title_slide = '
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Title</h4>
                        <textarea cols="80" name="slide_title" id="page_editor_title_slide">
                            '.$this->getData_banner_by_id($banner_id)[0]->title.'
                        </textarea>
                    </div>
                </div>
            </div>';
        return $html_title_slide;
    }

    public function html_option_enabled_slide($valueID_urlPev){
        $data_pages_banner = Pages::join('la_banner','la_pages.id','=','la_banner.page_id')
        ->where(['la_pages.id' => $valueID_urlPev,'la_banner.page_id' => $valueID_urlPev])
        ->select('la_pages.*','la_banner.id as banner_id','la_banner.enabled as banner_enabled'
        ,'la_banner.created_at as banner_created')->get();

        $html_option_enabled = "
            <div class='col-md-4'>
                <div class='card'>
                    <div class='card-body'>
                    <h4 class='header-title'>Status</h4>
                        <select name='slide_enabled' class='form-control'>";
        $end_html_option_enabled = "
                        </select>
                    </div>
                </div>
            </div>
       ";

        $result_html_option = $this->html_option_enabled($data_pages_banner[0]->banner_enabled);
        return $html_option_enabled .  $result_html_option . $end_html_option_enabled;
    }

    public function html_subtitle_slide($banner_id){
        $html_subtitle_slide = '
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Sub title</h4>
                        <textarea name="slide_subtitle" id="page_editor_subtitle_slide">
                            '.$this->getData_banner_by_id($banner_id)[0]->subtitle.'
                        </textarea>
                    </div>
                </div>
            </div>';
        return $html_subtitle_slide;
    }

    public function html_option_enabled_head($valueID_urlPev){
        $data_pages_banner = Pages::join('la_head','la_pages.id','=','la_head.page_id')
        ->where(['la_pages.id' => $valueID_urlPev,'la_head.page_id' => $valueID_urlPev])
        ->select('la_pages.*','la_head.id as head_id','la_head.enabled as head_enabled'
        ,'la_head.created_at as head_created')->get();

        $html_option_enabled = "
            <div class='col-md-4'>
                <div class='card'>
                    <div class='card-body'>
                    <h4 class='header-title'>Status</h4>
                        <select class='form-control' name='head_enabled'>";
        $end_html_option_enabled = "
                        </select>
                    </div>
                </div>
            </div>
       ";
        if($data_pages_banner[0]->banner_enabled == 1){
            $html_option_enabled .= '<option selected value='.$data_pages_banner[0]->banner_enabled.'>Hoạt động</option>';
        }
        else{
            $html_option_enabled .= '<option selected value='.$data_pages_banner[0]->banner_enabled.'>Ẩn</option>';
        }
        return $html_option_enabled . $this->html_option_else_enabled($data_pages_banner[0]->banner_enabled)
        . $end_html_option_enabled . "</div>";
    }

    public function getData_banner_by_id($banner_id){//người dùng click vào nút và nhận id từ hàm show_slide
            // $data = DB::table('la_banner')->join('la_pages','la_banner.page_id','=','la_pages.id')
            // ->where(['la_pages.id' => $valueID_urlPev,'la_banner.page_id' => $banner_id])
            // ->select('la_banner.*')->get();
            $data = DB::table('la_banner')->where(['la_banner.id' => $banner_id])->get();
            return $data;
    }

    public function getData_head_by_id($head_id){//người dùng click vào nút và nhận id từ hàm show_head
        // $data = DB::table('la_banner')->join('la_pages','la_banner.page_id','=','la_pages.id')
        // ->where(['la_pages.id' => $valueID_urlPev,'la_banner.page_id' => $banner_id])
        // ->select('la_banner.*')->get();
        $data = DB::table('la_head')->where(['la_head.id' => $head_id])->get();
        return $data;
    }

    public function html_choose_option_correct_head($valueID_urlPev,$get_selected_page){
        $data_pages_head = Pages::join('la_head','la_pages.id','=','la_head.page_id')
        ->where(['la_pages.id' => $valueID_urlPev,'la_head.page_id' => $valueID_urlPev])
        ->select('la_pages.*','la_head.id as head_id','la_head.title as head_title',
        'la_head.content as head_content','la_head.enabled as head_enabled'
        ,'la_head.created_at as head_created')->get();

        $chooseCorrectID = "";
        if($valueID_urlPev == $get_selected_page->page_id){
            $chooseCorrectID .= '<option selected value='.$get_selected_page->page_id.'>'.$data_pages_head[0]->name.'</option>';
        }
        return $chooseCorrectID;
    }

    public function html_choose_option_correct_banner($valueID_urlPev,$get_selected_page){
        $data_pages_banner = Pages::join('la_banner','la_pages.id','=','la_banner.page_id')
        ->where(['la_pages.id' => $valueID_urlPev,'la_banner.page_id' => $valueID_urlPev])
        ->select('la_pages.*','la_banner.id as banner_id','la_banner.title as banner_title',
        'la_banner.subtitle as banner_subtitle','la_banner.photo as banner_photo',
        'la_banner.created_at as banner_created')->get();

        $chooseCorrectID = "";
        if($valueID_urlPev == $get_selected_page->page_id){
            $chooseCorrectID .= '<option selected value='.$get_selected_page->page_id.'>'.$data_pages_banner[0]->name.'</option>';
        }
        return $chooseCorrectID;
    }

    public function get_selected_page_option_head($valueID_urlPev){
        $get_selected_page_head = DB::table('la_head')->join('la_pages','la_head.page_id','=','la_pages.id')
        ->where(['la_head.page_id' => $valueID_urlPev])->select('la_head.*','la_pages.name as page_name')->first();
        return $get_selected_page_head;
    }

    public function get_selected_page_option_banner($valueID_urlPev){
        $get_selected_page = DB::table('la_banner')->join('la_pages','la_banner.page_id','=','la_pages.id')
        ->where(['la_banner.page_id' => $valueID_urlPev])->select('la_banner.*','la_pages.name as page_name')->first();
        return $get_selected_page;
    }

    public function html_option_else_page($valueID_urlPev){
        //hàm này có nghĩa show ra thông tin các page khác
        $else_selected_page = DB::table('la_pages')->where('id','!=',$valueID_urlPev)->get();
        $html_option_else = "";
        foreach($else_selected_page as $elseItem){
            $html_option_else .= '<option value='.$elseItem->id.'>'.$elseItem->name.'</option>';
        }
        return $html_option_else;
    }

    public function html_select_start($className = NULL,$name = NULL){
        $html_start = "<select class=".$className." name=".$name." >";
        return $html_start;
    }

    public function html_select_end(){
        $html_end = "</select>";
        return $html_end;
    }

    public function html_option_enabled($value_number){//$value_number => value of enabled on database
        $html_option_else = "";
        $array_html_option = config('pages_value.array_html_option_enabled');
        $html_option_correct = "";
        $html_option_else = "";
        foreach($array_html_option as $key => $item){
            if($key == $value_number){
                $html_option_correct .= '<option selected value='.$key.'>'.$item.'</option>';
            }
            else{
                $html_option_else .= '<option value='.$key.'>'.$item.'</option>';
            }
        }
        return $html_option_correct . $html_option_else ;
    }

    public function compose(View $view){
        $banner_tabs =  DB::table('la_banner')->join('la_pages','la_banner.page_id','=','la_pages.id')
        ->where(['la_banner.page_id' => request()->id])->select('la_banner.*','la_pages.name as page_name')->get();
        $head_tabs =  DB::table('la_head')->join('la_pages','la_head.page_id','=','la_pages.id')
        ->where(['la_head.page_id' => request()->id])->select('la_head.*','la_pages.name as page_name')->get();
        $view->with('banner_tabs',$banner_tabs);
        $view->with('head_tabs',$head_tabs);
        $view->with('allData_pages', $this->getData_pages());
        // $view->with();
    }

}
