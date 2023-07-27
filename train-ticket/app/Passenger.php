<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    public function tickets()
    {
        //return $this->hasMany('App/Passenger');
        return $this->hasMany('App\Ticket' , 'passenger_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
