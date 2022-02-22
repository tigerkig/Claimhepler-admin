<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
class Form_3_Controller extends Controller
{
    public function index()
    {
        $user = Auth::user()->form_permission;
        $read_edit = Auth::user()->read_edit;
        $permission = explode("||", $user);
        if($permission[0] == '0' && $permission[1] == '0' && $permission[2] == '0') {
            return view('welcome');
        } else if ($permission[2] == '0'){
            if($permission[0] != '0' || $permission[1] != '0')
                return redirect('/home');
        } else {
            $reference = DB::connection('mysql-legacy')->select('SELECT * FROM _applicant_info LEFT JOIN _holderinfo ON _applicant_info.reference_id = _holderinfo.reference_id WHERE _applicant_info.formtype = "form3"');

            return view('form_3', ['permission_1'=>$permission[0], 'permission_2'=>$permission[1], 'permission_3'=>$permission[2], 'read_edit'=>$read_edit, 'references'=>$reference]);
        }
    }
}
