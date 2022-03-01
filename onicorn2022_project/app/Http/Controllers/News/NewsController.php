<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\View\View;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('Layouts.master');
        $list = News::all();
        return view('News.index', compact('list', $list));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $all_validate = FacadesValidator::make($request->all(), [
            'title' => 'required|',
            'author_name' => 'required|max:200',
            'content' => 'required',
        ]);
        if ($all_validate->fails()) {
            toastr()->error('Failed');
            return back()->withErrors($all_validate)->withInput();
        }

        $title = $request->input('title');
        //upload hình ảnh
        $photo_sub = "";
        $photo_sub_fileUpload = "";
        if ($request->hasFile('photo_sub_fileUpload')) {
            $photo_sub_fileUpload = $request->file('photo_sub_fileUpload');
            $photo_sub_fileName = $photo_sub_fileUpload->getClientOriginalName();
            $photo_sub = time() . "-" . $photo_sub_fileName;
        }
        $author_name = $request->input('author_name');
        $content = $request->input('content');
        $enabled = $request->input('enabled');
        $featured = $request->input('featured');
        $deleted = $request->input('deleted');
        $news = News::create([
            'title' => $title,
            'photo_sub' => $photo_sub,
            'author_name' => $author_name,
            'content' => $content,
            'enabled' => $enabled,
            'feattured' => $featured,
            'deleted' => $deleted,
        ]);
        //Hãy chỉnh cấu hình ví dụ để folder ở chỗ khác thì sẽ tự dộng move theo đường dẫn
        if ($request->hasFile('photo_sub_fileUpload')) {
            $photo_sub_fileUpload->move(public_path('uploads'), $photo_sub);
        }
        toastr()->success('New is added');

        return back()->with('message', 'New is added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // Tìm đến đối tượng muốn update
        $list = News::findOrFail($id);
        // điều hướng đến view edit user và truyền sang dữ liệu về user muốn sửa đổi
        return view('News.form_update', compact('list', $list));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        // $request->validate([
        //     'title' => 'required',
        //     'description' => 'required',
        // ]);

        // $post->update($request->all());

        // return redirect()->route('posts.index')->with('success','Post updated successfully');
        //
        $all_validate = FacadesValidator::make($request->all(), [
            'title' => 'required|',
            'author_name' => 'required|max:200',
            'content' => 'required',
        ]);
        if ($all_validate->fails()) {
            toastr()->error('Failed');
            return back()->withErrors($all_validate)->withInput();
        }

        $title = $request->input('title');
        //upload hình ảnh
        $photo_sub = "";
        $photo_sub_fileUpload = "";
        if ($request->hasFile('photo_sub_fileUpload')) {
            $photo_sub_fileUpload = $request->file('photo_sub_fileUpload');
            $photo_sub_fileName = $photo_sub_fileUpload->getClientOriginalName();
            $photo_sub = time() . "-" . $photo_sub_fileName;
        }
        $author_name = $request->input('author_name');
        $content = $request->input('content');
        $enabled = $request->input('enabled');
        $featured = $request->input('featured');
        $deleted = $request->input('deleted');
        $news = News::create([
            'title' => $title,
            'photo_sub' => $photo_sub,
            'author_name' => $author_name,
            'content' => $content,
            'enabled' => $enabled,
            'feattured' => $featured,
            'deleted' => $deleted,
        ]);
        //Hãy chỉnh cấu hình ví dụ để folder ở chỗ khác thì sẽ tự dộng move theo đường dẫn
        if ($request->hasFile('photo_sub_fileUpload')) {
            $photo_sub_fileUpload->move(public_path('uploads'), $photo_sub);
        }
        toastr()->success('New is update');

        return back()->with('message', 'New is update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $news = News::where('id', $id)->first();
        if ($news != null) {
            $news->delete();
            toastr()->success('Successfully deleted!!');
            return back();
        }
    }
}