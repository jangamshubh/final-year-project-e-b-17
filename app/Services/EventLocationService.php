<?php

namespace App\Services;

use App\Models\EventLocation;
use Auth;

class EventLocationService {

    public function getAllEventLocations() {
        if(Auth::user()->hasPermissionTo('Get All Event Locations')) {
            $event_locations = EventLocation::all();
            return $event_locations;
        }
    }

    public function createEventLocation($request) {
        if(Auth::user()->hasPermissionTo('Create Event Location')) {
            $event_location = EventLocation::create($request->all());
            return $event_location;
        }
    }

    public function editEventLocation($id) {
        if(Auth::user()->hasPermissionTo('Edit Event Location')) {
            $event_location = EventLocation::find($id);
            return $event_location;
        }
    }

    public function updateEventLocation($request,$id) {
        if(Auth::user()->hasPermissionTo('Edit Event Location')) {
            $event_location = EventLocation::find($id);
            $event_location->update($request->all());
            return $event_location;
        }
    }

    public function showEventLocation($id) {
        if(Auth::user()->hasPermissionTo('Show Event Location')) {
            $event_location = EventLocation::find($id);
            return $event_location;
        }
    }

    public function deleteEventLocation($id) {
        if(Auth::user()->hasPermissionTo('Edit Event Location')) {
            $event_location = EventLocation::find($id);
            $event_location->delete();
            $event_location = 'success';
            return $event_location;
        }
    }
}
