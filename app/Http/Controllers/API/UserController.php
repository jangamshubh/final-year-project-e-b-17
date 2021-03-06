<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{
    public function index(){
        $service = new UserService;
        $users = $service->getAllUsers();
        if ($users) {
            return response()->json([
                'data' => $users,
                'message' => 'Users Retrieved Successfully',
                'status' => 'Success',
            ]);
        } else {
            return response()->json([
                'message' => 'error'
            ]);
        }
    }

    public function store(Request $request){
        $service = new UserService;
        $user = $service->createUser($request);
        if ($user) {
            return response()->json([
                'data' => $user,
                'message' => 'User Created Successfully',
                'status' => 'Success',
            ]);
        } else {
            return response()->json([
                'message' => 'error'
            ]);
        }
    }

    public function edit($id){
        $service = new UserService;
        $user = $service->editUser($id);
        if ($user) {
            return response()->json([
                'data' => $user,
                'message' => 'User Retrieved Successfully',
                'status' => 'Success',
            ]);
        } else {
            return response()->json([
                'message' => 'error'
            ]);
        }
    }

    public function update(Request $request,$id){
        $service = new UserService;
        $user = $service->updateUser($request,$id);
        if ($user) {
            return response()->json([
                'data' => $user,
                'message' => 'User Updated Successfully',
                'status' => 'Success',
            ]);
        } else {
            return response()->json([
                'message' => 'error'
            ]);
        }
    }

    public function show($id){
        $service = new UserService;
        $user = $service->showUser($id);
        if ($user) {
            return response()->json([
                'data' => $user,
                'message' => 'User Retrieved Successfully',
                'status' => 'Success',
            ]);
        } else {
            return response()->json([
                'message' => 'error'
            ]);
        }
    }

    public function delete($id){
        $service = new UserService;
        $user = $service->deleteUser($id);
        if ($user) {
            return response()->json([
                'data' => $user,
                'message' => 'User Retrieved Successfully',
                'status' => 'Success',
            ]);
        } else {
            return response()->json([
                'message' => 'error'
            ]);
        }
    }


    public function getAllCommitteeAdmins() {
        $service = new UserService;
        $admins = $service->getAllCommitteeAdmins();
        if ($admins) {
            return response()->json([
                'data' => $admins,
                'message' => 'Users Retrieved Successfully',
                'status' => 'Success',
            ]);
        } else {
            return response()->json([
                'message' => 'error'
            ]);
        }
    }
}
