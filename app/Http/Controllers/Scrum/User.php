<?php

namespace App\Http\Controllers\Scrum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Scrum\UserModel;

class User extends Controller
{
    public function index(){
        $members= UserModel::all();
        return view('dashboard.members.list', ['members' =>$members]);
    }

    public function form_create_member(){
        return view('dashboard.members.create');
    }

    public function register_member(Request $request){
        $item = new UserModel();
        $item->id_number = $request->input('member_id');
        $item->name = $request->input('member_name');
        $item->email = $request->input('member_email');
        $item->speciality = $request->input('member_speciality');
        $item->password = $request->input('member_password');
        $item->save();
        return redirect()->route('members');
    }

    public function form_update_member($id){
        $member = UserModel::findOrFail($id);
        return view('dashboard.members.update', ['member' => $member]);
    }

    public function update_member(Request $request, $id){
        $item = UserModel::findOrFail($id);
        $item->id_number = $request->input('member_id');
        $item->name = $request->input('member_name');
        $item->email = $request->input('member_email');
        $item->speciality = $request->input('member_speciality');
        $item->password = $request->input('member_password');
        $item->save();
        return redirect()->route('members');
    }

    public function delete_member($id){
        $item = UserModel::findOrFail($id);
        $item->delete();
        return redirect()->route('members');
    }

}
