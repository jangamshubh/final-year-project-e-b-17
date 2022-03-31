<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';
    protected $fillable = ['name','description','no_of_people_expected','date','start_time','end_time','committee_id','event_location_id','added_by','is_approved'];

    public function event_get_event_locations() {
        return $this->belongsTo('App\Models\EventLocation', 'event_location_id');
    }
}
