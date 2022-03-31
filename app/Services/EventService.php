<?php

namespace App\Services;

use App\Models\Event;
use Auth;

class EventService {

    public function getAllEvents() {
        if(Auth::user()->hasPermissionTo('Get All Events')) {
            $events = Event::all();
            return $events;
        }
    }

    public function createEvent($request) {
        if(Auth::user()->hasPermissionTo('Create Event')) {
            $event = Event::create($request->all());
            return $event;
        }
    }

    public function editEvent($id) {
        if(Auth::user()->hasPermissionTo('Edit Event')) {
            $event = Event::find($id);
            return $event;
        }
    }

    public function updateEvent($request,$id) {
        if(Auth::user()->hasPermissionTo('Edit Event')) {
            $event = Event::find($id);
            $event->update($request->all());
            return $event;
        }
    }

    public function showEvent($id) {
        if(Auth::user()->hasPermissionTo('Show Event')) {
            $event = Event::find($id);
            return $event;
        }
    }

    public function deleteEvent($id) {
        if(Auth::user()->hasPermissionTo('Edit Event')) {
            $event = Event::find($id);
            $event->delete();
            $event = 'success';
            return $event;
        }
    }
}
