<?php

namespace App\Services;

use App\Models\Event;
use Auth;
use App\Models\Committee;
use Carbon\Carbon;
use App\Mail\EventCreatedMail;
use App\Mail\EventApprovedMail;
use Mail;
use App\Models\User;
class EventService {

    public function getAllEvents() {
        if(Auth::user()->hasPermissionTo('Get All Events')) {
            $events = Event::with('event_get_event_locations')->get();
            return $events;
        } elseif(Auth::user()->hasPermissionTo('Get All Committee Events')) {
            $events = Event::where('added_by',Auth::id())->with('event_get_event_locations')->get();
            return $events;
        }
    }

    public function createEvent($request) {
        if(Auth::user()->hasPermissionTo('Create Event')) {
            $committee_id = Committee::where('admin_id',Auth::id())->pluck('id')->first();
            $event = new Event;
            $event->name = $request->name;
            $event->description = $request->description;
            $event->no_of_people_expected = $request->no_of_people_expected;
            $event->date = Carbon::parse($request->date)->setTimezone('Asia/Kolkata')->format('d-M-Y');
            $start_time = $request->start_time['hours'] .':'. $request->start_time['minutes'];
            $end_time = $request->end_time['hours'] .':'. $request->end_time['minutes'];
            $event->start_time = Carbon::parse($start_time)->format('H:i');
            $event->end_time = Carbon::parse($end_time)->format('H:i');
            $event->committee_id = $committee_id;
            $event->event_location_id = $request->event_location_id;
            $event->added_by = Auth::id();
            $event->is_approved = 0;
            $event->save();
            $committee = Committee::find($committee_id);
            $mailData = [
                'title' => 'A new event has been added by '.$committee->name,
                'body' => 'Please check the platform for more details about the event',
            ];

            Mail::to('veventmanagementsystemvit@gmail.com')->send(new EventCreatedMail($mailData));
            return $event;
        }
    }

    public function approveEvent($id) {
        if(Auth::user()->hasPermissionTo('Approve Event')) {
            $event = Event::find($id);
            $event->is_approved = 1;
            $event->approved_at = Carbon::now()->format('d-m-Y H:i');
            $event->update();
            $admin = User::where('id',$event->added_by)->first();
            $mailData = [
                'title' => 'The event has been approved by the Admin!',
                'body' => 'Please check the platform for more details about the event',
            ];
            Mail::to($admin->email)->send(new EventApprovedMail($mailData));
            return $event;
        }
    }
    public function rejectEvent($id) {
        if(Auth::user()->hasPermissionTo('Approve Event')) {
            $event = Event::find($id);
            $event->is_approved = 2;
            $event->update();
            $admin = User::where('id',$event->added_by)->first();
            $mailData = [
                'title' => 'The event has been rejected by the Admin!',
                'body' => 'Please check the platform for more details about the event',
            ];
            Mail::to($admin->email)->send(new EventApprovedMail($mailData));
            return $event;
        }
    }

    public function editEvent($id) {
        if(Auth::user()->hasPermissionTo('Edit Event')) {
            $event = Event::find($id);
            if($event->added_by == Auth::id()) {
                return $event;
            }
        }
    }

    public function updateEvent($request,$id) {
        if(Auth::user()->hasPermissionTo('Edit Event')) {
            $event = Event::find($id);
            $event->name = $request->name;
            $event->description = $request->description;
            $event->no_of_people_expected = $request->no_of_people_expected;
            $event->date = Carbon::parse($request->date)->setTimezone('Asia/Kolkata')->format('d-M-Y');
            $start_time = $request->start_time['hours'] .':'. $request->start_time['minutes'];
            $end_time = $request->end_time['hours'] .':'. $request->end_time['minutes'];
            $event->start_time = Carbon::parse($start_time)->format('H:i');
            $event->end_time = Carbon::parse($end_time)->format('H:i');
            $event->event_location_id = $request->event_location_id;
            $event->is_approved = 0;
            $event->update();
            return $event;
        }
    }

    public function showEvent($id) {
        if(Auth::user()->hasPermissionTo('Show Event')) {
            $event = Event::where('id',$id)->with('event_get_event_locations')->first();
            return $event;
        }
    }

    public function deleteEvent($id) {
        if(Auth::user()->hasPermissionTo('Delete Event')) {
            $event = Event::find($id);
            $event->delete();
            $event = 'success';
            return $event;
        }
    }
}
