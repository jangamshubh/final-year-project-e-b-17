<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;
class DashboardController extends Controller
{
    public function index() {
        // $events = Event::where('date',Carbon::today());
        $events = Event::where('is_approved',1)->with('event_get_event_locations')->get();
        return response()->json([
            'data' => $events,
        ]);
    }
}
