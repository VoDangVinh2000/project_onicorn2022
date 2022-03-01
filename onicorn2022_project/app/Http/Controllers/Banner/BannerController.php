<?php

namespace App\Http\Controllers\Banner;

use App\Http\Controllers\Controller;
use App\Models\Banner\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $list = Banner::all();
        return view('Banner.index', compact('list', $list));
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
            'title' => 'required',
            'subtitle' => 'required',
            'enabled',
        ]);
        if ($all_validate->fails()) {
            toastr()->error('Failed');
            return back()->withErrors($all_validate)->withInput();
        }

        $title = $request->input('title');
        $subtitle = $request->input('subtitle');
        //upload hình ảnh
        $photo = "";
        $photo_fileUpload = "";
        if ($request->hasFile('photo_fileUpload')) {
            $photo_fileUpload = $request->file('photo_fileUpload');
            $photo_fileName = $photo_fileUpload->getClientOriginalName();
            $photo = time() . "-" . $photo_fileName;
        }
        $enabled = $request->input('enabled');
        $banner = Banner::create([
            'title' => $title,
            'subtitle' => $subtitle,
            'photo' => $photo,
            'enabled' => $enabled,
        ]);
        //Hãy chỉnh cấu hình ví dụ để folder ở chỗ khác thì sẽ tự dộng move theo đường dẫn
        if ($request->hasFile('photo_fileUpload')) {
            $photo_fileUpload->move(public_path('uploads'), $photo);
        }
        toastr()->success('Banner is added');

        return back()->with('message', 'Banner is added');

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
        $banner = Banner::where('id', $id)->first();
        if ($banner != null) {
            $banner->delete();
            toastr()->success('Successfully deleted!!');
            return back();
        }
    }
}