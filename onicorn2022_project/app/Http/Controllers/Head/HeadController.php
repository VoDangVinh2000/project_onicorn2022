<?php

namespace App\Http\Controllers\Head;

use App\Http\Controllers\Controller;
use App\Models\Head\Head;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;
class HeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $list = Head::all();
        return view('Head.index', compact('list', $list));
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
            'content' => 'required',
        ]);
        if ($all_validate->fails()) {
            toastr()->error('Failed');
            return back()->withErrors($all_validate)->withInput();
        }

        $title = $request->input('title');
        $content = $request->input('content');
        $enabled = $request->input('enabled');
        $head = Head::create([
            'title' => $title,
            'content' => $content,
            'enabled' => $enabled,
        ]);
        toastr()->success('head is added');

        return back()->with('message', 'head is added');
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

        $head = Head::where('id', $id)->first();
        if ($head != null) {
            $head->delete();
            toastr()->success('Successfully deleted!!');
            return back();
        }
    }
}