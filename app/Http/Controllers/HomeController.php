<?php

namespace App\Http\Controllers;

use App\Awards;
use App\Education;
use App\Experience;
use App\Interest;
use App\Profile;
use App\Role;
use App\Skills;
use App\SocialMedia;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Role::isRole('admin')){
            return redirect()->route('dashboard');
        }else{
            $profile = Profile::first();
            $social_media = SocialMedia::all();
            $experience = Experience::all();
            $education = Education::all();
            $interest = Interest::first();
            $awards = Awards::all();
            $skills = Skills::orderBy('type','desc')->get();
            $scategory= Skills::select('type')->groupBy('type')->orderBy('type','desc')->get();
            return view('guest.index',compact('profile','scategory','skills','social_media','experience','education','interest','awards'));
        }
    }
    public function desain(){
        return view('home');
    }
}
