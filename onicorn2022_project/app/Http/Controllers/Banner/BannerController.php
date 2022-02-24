<?php

namespace App\Http\Controllers\Banner;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Banner\Banner;
class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::all(); 
        return view('Banner.index',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('Banner.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title'=>'required',
            'subtitle' => 'required',
            'page_id' => 'required',
            'photo' => 'required',           
            'enabled' => 'required' 
        ]);
    

        $banner = new Banner([
            'title' => $request->get('title'),
            'subtitle' => $request->get('subtitle'),
            'page_id' => $request->get('page_id'),
            'photo' => basename($request->file('photo')->store('public/uploads')),
            'enabled' => $request->get('enabled')
          
        ]);

        $banner->save();
        return redirect('/admin-banner')->with('success', 'Banner added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner =  Banner::find($id);
        return view('Banner.edit',compact('banner'));
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
          $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'page_id' => 'required',
            'photo' => '',
            'enable' => ''
        ]);

        $banner = Banner::find($id);
        $banner->title = $request->get('title');
        $banner->subtitle = $request->get('subtitle');
        $banner-> page_id = $request->get('page_id');
        $banner->photo = basename($request->file('photo')->store('public/uploads'));
        $banner->enabled = $request->get('enabled');
        //3 Luu
        $banner->save();
        return redirect('/admin-banner')->with('success', 'Banner updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::find($id);
        $banner->delete();
        return redirect('/admin-banner')->with('success', 'Deleted.');
    }
}
