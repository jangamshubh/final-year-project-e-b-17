<?php

namespace App\Services;

use App\Models\Committee;
use Auth;

class CommitteeService {

    public function getAllCommittees() {
        if(Auth::user()->hasPermissionTo('Get All Committees')) {
            $committees = Committee::with('committee_get_admins')->get();
            return $committees;
        }
    }

    public function createCommittee($request) {
        if(Auth::user()->hasPermissionTo('Create Committee')) {
            $committee = Committee::create($request->all());
            return $committee;
        }
    }

    public function editCommittee($id) {
        if(Auth::user()->hasPermissionTo('Edit Committee')) {
            $committee = Committee::find($id);
            return $committee;
        }
    }

    public function updateCommittee($request,$id) {
        if(Auth::user()->hasPermissionTo('Edit Committee')) {
            $committee = Committee::find($id);
            $committee->update($request->all());
            return $committee;
        }
    }

    public function showCommittee($id) {
        if(Auth::user()->hasPermissionTo('Show Committee')) {
            $committee = Committee::where('id',$id)->with('committee_get_admins')->first();
            return $committee;
        }
    }

    public function deleteCommittee($id) {
        if(Auth::user()->hasPermissionTo('Delete Committee')) {
            $committee = Committee::find($id);
            $committee->delete();
            $committee = 'success';
            return $committee;
        }
    }
}
