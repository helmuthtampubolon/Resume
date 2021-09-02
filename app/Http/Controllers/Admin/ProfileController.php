<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Profile;
use File;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Profile::first();
        return view('admin.content.profile.index', compact('profile'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'address' => 'required',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'destrict' => 'required|max:255',
            'about' => 'required|max:255',
            'email' => 'required|max:255',
        ]);

        if ($files = $request->file('picture')) {
            // Define upload path
            $destinationPath = public_path('/assets/img/'); // upload path
            // Upload Orginal Image
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);

            $data = Profile::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'address' => $request->address,
                'picture' => $profileImage,
                'destrict' => $request->destrict,
                'city' => $request->city,
                'region' => $request->region,
                'about' => $request->about,
                'email' => $request->email
            ]);

            return redirect()->back()->with(['success' => 'Successfully Created']);
        }
        return redirect()->back()->with(['error' => 'Fail to Insert The Data']);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = Profile::find($id);
        return view('admin.content.profile.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'address' => 'required',
            'city' => 'required|max:255',
            'region' => 'required|max:255',
            'destrict' => 'required|max:255',
            'about' => 'required',
            'email' => 'required|max:255|email:rfc,dns',
        ]);
        $data = Profile::find($id);
        if ($files = $request->hasFile('picture')) {
            // Define upload path
            !empty($request->picture) ? File::delete(public_path('assets/img/' . $request->picture)) : null;
            $destinationPath = public_path('assets/img/'); // upload path
            // Upload Orginal Image
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $data->picture = $profileImage;
        }
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->address = $request->address;
        $data->destrict = $request->destrict;
        $data->city = $request->city;
        $data->region = $request->region;
        $data->about = $request->about;
        $data->email = $request->email;
        $data->update();

        return redirect()->route('experience.index')->with(['success' => 'Successfully Edited']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Profile::findOrFail($id);
        $data->delete();
        return redirect()->back()->with(['success' => 'Successfully Deleted']);
    }
}
