<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Banner\Banner;
use App\Models\Head\Head;
use App\Models\Page\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = Page::all();
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = Page::find($id);

        if ($page) {
            $banner = Page::find($id)->banner;
            return response()->json([
                'message' => 'banner found!',
                'banner' => $banner,
            ]);
        }
        return response()->json([
            'message' => 'page not found!',
            'page' => $page,
        ]);

        /*  $banner = Page::find($id)->banner;
    return view('',compact($banner));
     */
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
    }

    public function showHead($id)
    {
        $page = Page::find($id);

        if ($page) {
            $head = Page::find($id)->head;
            if ($head) {
                return response()->json([
                    'message' => 'head found!',
                    'head' => $head,
                ]);
            } else {
                return response()->json([
                    'message' => 'head not found!',
                    'head' => $head,
                ]);
            }
        }
        return response()->json([
            'message' => 'page not found!',
            'page' => $page,
        ]);

        /*  $head = Page::find($id)->head;
    return view('',compact($head));
     */
    }
}
