<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\EventLocationService;

class EventLocationController extends Controller
{
    public function index(){
        $service = new EventLocationService;
        $event_locations = $service->getAllEventLocations();
        if ($event_locations) {
            return response()->json([
                'data' => $event_locations,
                'message' => 'Event Locations Retrieved Successfully',
                'status' => 'Success',
            ]);
        } else {
            return response()->json([
                'message' => 'error'
            ]);
        }
    }

    public function store(Request $request){
        $service = new EventLocationService;
        $event_location = $service->createEventLocation($request);
        if ($event_location) {
            return response()->json([
                'data' => $event_location,
                'message' => 'Event Location Created Successfully',
                'status' => 'Success',
            ]);
        } else {
            return response()->json([
                'message' => 'error'
            ]);
        }
    }

    public function edit($id){
        $service = new EventLocationService;
        $event_location = $service->editEventLocation($id);
        if ($event_location) {
            return response()->json([
                'data' => $event_location,
                'message' => 'Event Location Retrieved Successfully',
                'status' => 'Success',
            ]);
        } else {
            return response()->json([
                'message' => 'error'
            ]);
        }
    }

    public function update(Request $request,$id){
        $service = new EventLocationService;
        $event_location = $service->updateEventLocation($request,$id);
        if ($event_location) {
            return response()->json([
                'data' => $event_location,
                'message' => 'Event Location Updated Successfully',
                'status' => 'Success',
            ]);
        } else {
            return response()->json([
                'message' => 'error'
            ]);
        }
    }

    public function show($id){
        $service = new EventLocationService;
        $event_location = $service->showEventLocation($id);
        if ($event_location) {
            return response()->json([
                'data' => $event_location,
                'message' => 'Event Location Retrieved Successfully',
                'status' => 'Success',
            ]);
        } else {
            return response()->json([
                'message' => 'error'
            ]);
        }
    }

    public function delete($id){
        $service = new EventLocationService;
        $event_location = $service->deleteEventLocation($id);
        if ($event_location) {
            return response()->json([
                'data' => $event_location,
                'message' => 'Event Location Deleted Successfully',
                'status' => 'Success',
            ]);
        } else {
            return response()->json([
                'message' => 'error'
            ]);
        }
    }
}
