<?php

namespace App\Http\Controllers\Admin;

use App\Experience;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experience = Experience::all();
        return view('admin.content.experience.index',compact('experience'));
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
        $request->validate([
            'title' => 'required|max:255',
            'role' => 'required|max:255',
            'description' => 'required',
            'start_period' => 'required|max:255',
            'end_period' => 'required|max:255',
        ]);

        $data = Experience::create($request->all());

        return redirect()->back()->with(['success'=>'Successfully Created']);
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
        $experience = Experience::find($id);
        return view('admin.content.experience.edit',compact('experience'));
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
        $data = Experience::find($id);
        $data->title = $request->title;
        $data->role = $request->role;
        $data->description = $request->description;
        $data->start_period = $request->start_period;
        $data->end_period = $request->end_period;
        $data->update();

        return redirect()->route('experience.index')->with(['success'=>'Successfully Edited']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Experience::findOrFail($id);
        $data->delete();
        return redirect()->back()->with(['success'=>'Successfully Deleted']);
    }
}
