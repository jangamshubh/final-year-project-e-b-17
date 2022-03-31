<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Committee extends Model
{
    use HasFactory;

    protected $table = 'committees';
    protected $fillable = ['name','description','admin_id'];


    public function committee_get_admins() {
        return $this->belongsTo('App\Models\User', 'admin_id');
    }
}
