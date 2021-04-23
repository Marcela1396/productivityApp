<?php

namespace App\Http\Controllers\Scrum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Scrum\MemberModel;

class Member extends Controller
{
    public function index(){
        $members= MemberModel::all();
        return view('dashboard.members.list', ['members' =>$members]);
    }

    public function form_create_member(){
        return view('dashboard.members.create');
    }

    public function register_member(Request $request){
        $item = new MemberModel();
        $item->id_number = $request->input('member_id');
        $item->name = $request->input('member_name');
        $item->email = $request->input('member_email');
        $item->speciality = $request->input('member_speciality');
        $item->save();
        return redirect()->route('members');
    }

    public function form_update_member($id){
        $member = MemberModel::findOrFail($id);
        return view('dashboard.members.update', ['member' => $member]);
    }

    public function update_member(Request $request, $id){
        $item = MemberModel::findOrFail($id);
        $item->id_number = $request->input('member_id');
        $item->name = $request->input('member_name');
        $item->email = $request->input('member_email');
        $item->speciality = $request->input('member_speciality');
        $item->save();
        return redirect()->route('members');
    }

    public function delete_member($id){
        $item = MemberModel::findOrFail($id);
        $item->delete();
        return redirect()->route('members');
    }

}
