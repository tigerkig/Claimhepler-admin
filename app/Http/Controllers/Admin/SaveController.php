<?php

namespace App\Http\Controllers\Admin;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SaveController extends Controller
{
    public function index(Request $request)
    {
        $UserName = $request->input('UserName');
        $UserEmail = $request->input('UserEmail');
        $UserPassword = Hash::make($request->input('UserPassword'));
        $read_edit = $request->input('read_edit');
        $form_permission = $request->input('form_permission');
        $isEmail = DB::select('select id from users where email = ?', [$UserEmail]);

        if(!count($isEmail)) {
            DB::insert('insert into users (name, email, password, read_edit, form_permission) values (?, ?, ?, ?, ?)', [$UserName, $UserEmail, $UserPassword, $read_edit, $form_permission]);
            $users = DB::select('select id, name, email, read_edit, form_permission from users');
            return json_encode($users);
        } else {
            return 'exist';
        }
    }

    public function delete(Request $request)
    {
        $ids = $request->input('delete_id');
        $delete_id = json_decode($ids);
        foreach ($delete_id as $key => $value) {
            DB::delete('delete from users where id = ?', [$value]);
        }
        return 'success';
    }

    public function select(Request $request)
    {
        $id = $request->input('select_id');
        $users = DB::select('select id, name, email, read_edit, form_permission from users where id = ?', [$id]);
        return json_encode($users);
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $UserName = $request->input('UserName');
        $UserEmail = $request->input('UserEmail');
        $UserPassword = Hash::make($request->input('UserPassword'));
        $read_edit = $request->input('read_edit');
        $form_permission = $request->input('form_permission');

        DB::update('update users set name=?, email=?, password=?, read_edit=?, form_permission=? where id=?', [$UserName, $UserEmail, $UserPassword, $read_edit, $form_permission, $id]);
        $users = DB::select('select id, name, email, read_edit, form_permission from users');
        return json_encode($users);
    }
}
