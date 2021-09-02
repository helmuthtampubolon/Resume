<?php

namespace App\Http\Controllers\Admin;

use App\Interest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InterestController extends Controller
{
    public function index(){
        $interest = Interest::all();
        return view('admin.content.Interest.index',compact('interest'));
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
            'description' => 'required'
        ]);

        $data = Interest::create([
            'description' => $request->description
        ]);

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
        $interest = Interest::find($id);
        return view('admin.content.interest.edit',compact('interest'));
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
        $interest = Interest::find($id);
        $interest->description = $request->description;
        $interest->update();

        return redirect()->route('interest.index')->with(['success'=>'Successfully Edited']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $interest = Interest::findOrFail($id);
        $interest->delete();
        return redirect()->back()->with(['success'=>'Successfully Deleted']);
    }
}
