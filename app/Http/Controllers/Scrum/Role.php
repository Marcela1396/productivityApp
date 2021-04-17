<?php

namespace App\Http\Controllers\Scrum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Scrum\RoleModel;

class Role extends Controller
{
    public function index(){
        $roles= RoleModel::all();
        return view('dashboard.roles.list', ['roles' =>$roles]);
    }

    public function form_create_role(){
        return view('dashboard.roles.create');
    }

    public function register_role(Request $request){
        $item = new RoleModel();
        $item->name = $request->input('role_name');
        $item->description = $request->input('role_description');
        $item->save();
        return redirect()->route('roles');
    }

    public function form_update_role($id){
        $role = RoleModel::findOrFail($id);
        return view('dashboard.roles.update', ['role' => $role]);
    }

    public function update_role(Request $request, $id){
        $item = RoleModel::findOrFail($id);
        $item->name = $request->input('role_name');
        $item->description = $request->input('role_description');
        $item->save();
        return redirect()->route('roles');
    }

    public function delete_role($id){
        $item = RoleModel::findOrFail($id);
        $item->delete();
        return redirect()->route('roles');
    }
}
