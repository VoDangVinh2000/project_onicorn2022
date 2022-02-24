<?php

namespace App\Http\Controllers\Menus;

use App\Http\Controllers\Controller;
use App\Models\Menus\Menus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\View\View;

class MenusController extends Controller
{

    // function list() {
    //     $list = Menus::all();
    //     return view('Menus.index', compact('list', $list));
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Menus::all();
        return view('Menus.index', compact('list', $list));
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
        $all_validate = FacadesValidator::make($request->all(), [
            'name' => 'required|max:200',
            'link' => 'max:100|nullable',
            'icon_fileUpload' => 'max:100',
        ]);
        if ($all_validate->fails()) {
            toastr()->error('Failed');
            return back()->withErrors($all_validate)->withInput();
        }

        $name = $request->input('name');
        $link = $request->input('link');
        $icon = "";
        $icon_fileUpload = "";
        if ($request->hasFile('icon_fileUpload')) {
            $icon_fileUpload = $request->file('icon_fileUpload');
            $icon_fileName = $icon_fileUpload->getClientOriginalName();
            $icon = time() . "-" . $icon_fileName;
        }

        $enabled = $request->input('enabled');
        $menus = Menus::create([
            'name' => $name,
            'link_href' => $link,
            'icon' => $icon,
            'enabled' => $enabled,
        ]);
        //Hãy chỉnh cấu hình ví dụ để folder ở chỗ khác thì sẽ tự dộng move theo đường dẫn
        if ($request->hasFile('icon_fileUpload')) {
            $icon_fileUpload->move(public_path('uploads'), $icon);
        }
        toastr()->success('Menu is added');

        return back()->with('message', 'Menu is added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        // $list = $request->all();
        // Menus::create($list);
        // $menu = Menus::orderBy('di', 'DESC')->first();
        // return redirect("admin-menus?id=$menu->id")->back()->with('success', 'menu successfully');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
        $menu = Menus::find($id);
        return response()->json([
            'data' => $menu,
        ]);

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
        //
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
        $menus = Menus::where('id', $id)->first();
        if ($menus != null) {
            $menus->delete();
            toastr()->success('Successfully deleted!!');
            return back();
        }

    }

    public function compose(View $view)
    {
        $list = Menus::all();
        $view->with('index', $list);
    }
}