<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\EventService;
class EventController extends Controller
{
    public function index(){
        $service = new EventService;
        $events = $service->getAllEvents();
        if ($events) {
            return response()->json([
                'data' => $events,
                'message' => 'Events Retrieved Successfully',
                'status' => 'Success',
            ]);
        } else {
            return response()->json([
                'message' => 'error'
            ]);
        }
    }

    public function store(Request $request){
        $service = new EventService;
        $event = $service->createEvent($request);
        if ($event) {
            return response()->json([
                'data' => $event,
                'message' => 'Event Created Successfully',
                'status' => 'Success',
            ]);
        } else {
            return response()->json([
                'message' => 'error'
            ]);
        }
    }

    public function edit($id){
        $service = new EventService;
        $event = $service->editEvent($id);
        if ($event) {
            return response()->json([
                'data' => $event,
                'message' => 'Event Retrieved Successfully',
                'status' => 'Success',
            ]);
        } else {
            return response()->json([
                'message' => 'error'
            ]);
        }
    }

    public function update(Request $request,$id){
        $service = new EventService;
        $event = $service->updateEvent($request,$id);
        if ($event) {
            return response()->json([
                'data' => $event,
                'message' => 'Event Updated Successfully',
                'status' => 'Success',
            ]);
        } else {
            return response()->json([
                'message' => 'error'
            ]);
        }
    }

    public function show($id){
        $service = new EventService;
        $event = $service->showEvent($id);
        if ($event) {
            return response()->json([
                'data' => $event,
                'message' => 'Event Retrieved Successfully',
                'status' => 'Success',
            ]);
        } else {
            return response()->json([
                'message' => 'error'
            ]);
        }
    }

    public function delete($id){
        $service = new EventService;
        $event = $service->deleteEvent($id);
        if ($event) {
            return response()->json([
                'data' => $event,
                'message' => 'Event Retrieved Successfully',
                'status' => 'Success',
            ]);
        } else {
            return response()->json([
                'message' => 'error'
            ]);
        }
    }

    public function approveEvent($id) {
        $service = new EventService;
        $event = $service->approveEvent($id);
        if ($event) {
            return response()->json([
                'data' => $event,
                'message' => 'Event Retrieved Successfully',
                'status' => 'Success',
            ]);
        } else {
            return response()->json([
                'message' => 'error'
            ]);
        }
    }
}
