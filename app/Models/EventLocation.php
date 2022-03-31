<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventLocation extends Model
{
    use HasFactory;

    protected $table = 'event_locations';
    protected $fillable = ['name','description','location','seating_capacity'];

    public function event_get_event_locations() {
        return $this->hasMany('App\Models\Event', 'event_location_id');
    }
}
