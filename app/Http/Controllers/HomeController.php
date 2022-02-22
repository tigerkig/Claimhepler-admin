<?php

namespace App\Http\Controllers;
use DB;
use Auth;
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $user = Auth::user()->form_permission;
        $read_edit = Auth::user()->read_edit;
        $permission = explode("||", $user);
        if($permission[0] == '0' && $permission[1] == '0' && $permission[2] == '0') {
            Auth::logout();
            return view('welcome');
        } else {
            return view('home', ['permission_1'=>$permission[0], 'permission_2'=>$permission[1], 'permission_3'=>$permission[2], 'read_edit'=>$read_edit]);
        }
    }
    
    public function register()
    {
        return redirect('/');
    }
}
