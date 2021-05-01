<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Models\Scrum\User_Model_Team_Model;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $users = User::with('roles')->get();
       $response = array();
        if(sizeof($users) > 0){
            $response['status']= true;
            $response['message']= '';

        }else{
            $response['status']= false;
            $response['message']= 'No hay usuarios registrados';

        }
        return view('users.index',compact('response','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->all();
        $params['password'] =  Hash::make($params['password']); 
        $user =  User::create($params);

        $user->assignRole(Role::find($params['role'])->name);
        return redirect()->route('users.index', ['User created']);
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
        $user = User::find($id);
        $roles = Role::all();
        return view('users.edit',compact('user','roles'));
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
        $params =$request->all();
        $user= User::find($id);
        if ($user) {
           
            isset($params['password'])?$params['password'] =  Hash::make($params['password']):$params['password']=$user->password; 
            $user->fill($params);
            $user->save();
            $user->syncRoles([Role::find($params['role'])->id]);
        }
        return redirect()->route('users.index', ['User updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = array();
        if($user= User::find($id)){
            $user_team = User_Model_Team_Model::where('user_id',$id)->get()->first();
            if(!$user_team){
                $user->delete();
                $response['status'] = true;
                $response['msg'] = "User $user->name deleted";
            }else{
                $response['status'] = false;
                $response['msg'] = "User  $user->name is in a team, remove user from team before delete ";
            }
        }else{
            $response['status'] = true;
            $response['msg'] = "User with id $id not found";
        }
        return json_encode($response);
    }
}
