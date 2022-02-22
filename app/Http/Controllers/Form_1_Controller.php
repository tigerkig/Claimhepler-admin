<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use Illuminate\Http\Request;

class Form_1_Controller extends Controller
{
    public function index()
    {

        $user = Auth::user()->form_permission;
        $read_edit = Auth::user()->read_edit;
        $permission = explode("||", $user);
        if($permission[0] == '0' && $permission[1] == '0' && $permission[2] == '0') {
            return view('welcome');
        } else if ($permission[0] == '0'){
            if($permission[1] != '0' || $permission[2] != '0')
                return redirect('/home');
        } else {
            $reference = DB::connection('mysql-legacy')->select('SELECT * FROM _applicant_info LEFT JOIN _holderinfo ON _applicant_info.reference_id = _holderinfo.reference_id WHERE _applicant_info.formtype = "form1"');

            return view('form_1', ['permission_1'=>$permission[0], 'permission_2'=>$permission[1], 'permission_3'=>$permission[2], 'read_edit'=>$read_edit, 'references'=>$reference]);
        }
    }

    public function remark_status(Request $request)
    {
        $id = $request->input('id');
        $each_column = DB::connection('mysql-legacy')
        ->select("SELECT * FROM _f1_ce 
                    LEFT JOIN _f1_de ON _f1_ce.reference_id = _f1_de.reference_id 
                    LEFT JOIN _f1_ec ON _f1_ce.reference_id = _f1_ec.reference_id 
                    LEFT JOIN _f1_image ON _f1_ce.reference_id = _f1_image.reference_id 
                    LEFT JOIN _f1_lsca ON _f1_ce.reference_id = _f1_lsca.reference_id 
                    LEFT JOIN _f1_pa ON _f1_ce.reference_id = _f1_pa.reference_id 
                    LEFT JOIN _f1_rep ON _f1_ce.reference_id = _f1_rep.reference_id 
                    LEFT JOIN _f1_rhe ON _f1_ce.reference_id = _f1_rhe.reference_id 
                    LEFT JOIN _f1_she ON _f1_ce.reference_id = _f1_she.reference_id 
                    WHERE _f1_ce.reference_id = '$id'");

        return json_encode($each_column);
    }

    public function remark_status_save(Request $request) 
    {   
        $remark = $request->input('remark');
        $status = $request->input('status');
        $reference_id = $request->input('reference_id');
        $Policy_No = $request->input('Policy_No');
        $user_email = $user = Auth::user()->email;
        $date = date('Y-m-d H:i:s');

        DB::insert('insert into form_r_s (reference_id, Policy_No, remark, status, user_email, form_type, created_at) values (?, ?, ?, ?, ?, ?, ?)', [$reference_id, $Policy_No, $remark, $status, $user_email, 'form_1', $date]);
        return 'success';
    }
}
