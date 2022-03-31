<?php

namespace App\Services;

use App\Models\User;
use Auth;

class UserService {

    public function getAllUsers() {
        if(Auth::user()->hasPermissionTo('View All Users')) {
            $users = User::all();
            return $users;
        }
    }

    public function createUser($request) {
        if(Auth::user()->hasPermissionTo('Create User')) {
            $user = new User;
            $user->name = $request->name;
            $user->mobile_number = $request->mobile_number;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
            $user->assignRole($request->role);
            return $user;
        }
    }

    public function editUser($id) {
        if(Auth::user()->hasPermissionTo('Edit User')) {
            $user = User::find($id);
            return $user;
        }
    }

    public function updateUser($request,$id) {
        if(Auth::user()->hasPermissionTo('Edit User')) {
            $user = User::find($id);
            $user->name = $request->name;
            $user->update();
            return $user;
        }
    }

    public function deleteUser($id) {
        if(Auth::user()->hasPermissionTo('Delete User')) {
            $user = User::find($id);
            $user->delete();
            $user = 'Deleted Successfully';
            return $user;
        }
    }

    public function showUser($id) {
        if(Auth::user()->hasPermissionTo('Show User')) {
            $user = User::find($id);
            return $user;
        }
    }


}
