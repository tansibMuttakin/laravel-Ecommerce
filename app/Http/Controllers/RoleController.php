<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::all();
        return view('admin.roles.rolesIndex')->with('roles',$roles);
    }

    public function create(){
        return view('admin.roles.roleCreate');
    }

    public function store(Request $request){
        $role = new Role;
        $role->name = $request->name;
        $role->save();
        return redirect()->route('roles.index')->with('status','Roles Added!');
    }

    public function update(Request $request,$roleId){
        $role = Role::find($roleId);
        $role->name = $request->name;
        $role->save();
        return redirect()->route('roles.index')->with('status','Roles Updated!');
    }
    
    public function edit($roleId){
        $role = Role::find($roleId);
        return view('admin.roles.roleEdit')->with('role',$role);
    }
    public function destroy($roleId){
        $role = Role::find($roleId);
        $role->delete();
        return redirect()->route('roles.index')->with('status','role deleted!');
    }
    public function assign(Request $request, $userId){
        $roles = [];
        $roleName = [];
        $roles = $request->roles;
        $user = User::find($userId);
        if ($user->isSuperAdmin) {
            foreach ($roles as $role) {
                $name = json_decode($role)->name;
                array_push($roleName, $name);
            }
            if (!in_array("Admin", $roleName)) {
                return redirect()->back()->with('status','You must check Admin Role!');
            }
        }
        if (!$user->isSuperAdmin) {
            foreach ($roles as $role) {
                $name = json_decode($role)->name;
                array_push($roleName, $name);
            }
            if (in_array("Admin", $roleName)) {
                return redirect()->back()->with('status','You can not assign more than one admin!');
            }
        }
        // if ($user->isSuperAdmin) {
        //     foreach ($roles as $role) {
        //         dd(json_decode($role->name));
        //     }
        // }


        $user->roles()->detach();
        foreach ($roles as $role) {
            $user->roles()->attach(json_decode($role)->id);
        }
        return redirect()->route('user.index')->with('status','Roles added successfully');
    }
}
