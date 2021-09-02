<?php

namespace App\Http\Controllers\Admin;

use App\Skills;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = Skills::all();
        return view('admin.content.skills.index',compact('skills'));
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
            'type' => 'required|max:255',
        ]);

       Skills::create($request->all());

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
        $skill = Skills::find($id);
        return view('admin.content.skills.edit',compact('skill'));
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
        $data = Skills::find($id);
        $data->name = $request->name;
        $data->icon = $request->icon;
        $data->type = $request->type;
        $data->update();

        return redirect()->route('skills.index')->with(['success'=>'Successfully Edited']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $skill = Skills::findOrFail($id);
        $skill->delete();
        return redirect()->back()->with(['success'=>'Successfully Deleted']);
    }
}
