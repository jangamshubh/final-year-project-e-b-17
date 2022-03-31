<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CommitteeService;

class CommitteeController extends Controller
{
    public function index(){
        $service = new CommitteeService;
        $committees = $service->getAllCommittees();
        if ($committees) {
            return response()->json([
                'data' => $committees,
                'message' => 'Committees Retrieved Successfully',
                'status' => 'Success',
            ]);
        } else {
            return response()->json([
                'message' => 'error'
            ]);
        }
    }

    public function store(Request $request){
        $service = new CommitteeService;
        $committee = $service->createCommittee($request);
        if ($committee) {
            return response()->json([
                'data' => $committee,
                'message' => 'Committee Created Successfully',
                'status' => 'Success',
            ]);
        } else {
            return response()->json([
                'message' => 'error'
            ]);
        }
    }

    public function edit($id){
        $service = new CommitteeService;
        $committee = $service->editCommittee($id);
        if ($committee) {
            return response()->json([
                'data' => $committee,
                'message' => 'Committee Retrieved Successfully',
                'status' => 'Success',
            ]);
        } else {
            return response()->json([
                'message' => 'error'
            ]);
        }
    }

    public function update(Request $request,$id){
        $service = new CommitteeService;
        $committee = $service->updateCommittee($request,$id);
        if ($committee) {
            return response()->json([
                'data' => $committee,
                'message' => 'Committee Updated Successfully',
                'status' => 'Success',
            ]);
        } else {
            return response()->json([
                'message' => 'error'
            ]);
        }
    }

    public function show($id){
        $service = new CommitteeService;
        $committee = $service->showCommittee($id);
        if ($committee) {
            return response()->json([
                'data' => $committee,
                'message' => 'Committee Retrieved Successfully',
                'status' => 'Success',
            ]);
        } else {
            return response()->json([
                'message' => 'error'
            ]);
        }
    }

    public function delete($id){
        $service = new CommitteeService;
        $committee = $service->deleteCommittee($id);
        if ($committee) {
            return response()->json([
                'data' => $committee,
                'message' => 'Committee Retrieved Successfully',
                'status' => 'Success',
            ]);
        } else {
            return response()->json([
                'message' => 'error'
            ]);
        }
    }
}
