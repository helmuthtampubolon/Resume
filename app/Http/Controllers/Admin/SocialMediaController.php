<?php

namespace App\Http\Controllers\Admin;

use App\SocialMedia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SocialMediaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socialMedia = SocialMedia::all();
        return view('admin.content.social-media.index',compact('socialMedia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'icon' => 'required|max:255',
            'link' => 'required|url',
        ]);

        SocialMedia::create($request->all());

        return redirect()->back()->with(['success'=>'Successfully Created']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $socialMedia = SocialMedia::find($id);
        return view('admin.content.social-media.edit',compact('socialMedia'));
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
        $data = SocialMedia::find($id);
        $data->name = $request->name;
        $data->icon = $request->icon;
        $data->link = $request->link;
        $data->update();

        return redirect()->route('social-media.index')->with(['success'=>'Successfully Edited']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $socialMedia = SocialMedia::findOrFail($id);
        $socialMedia->delete();
        return redirect()->back()->with(['success'=>'Successfully Deleted']);
    }
}
