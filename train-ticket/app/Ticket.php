<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public function user()
    {
        //return $this->hasMany('App/Passenger');
        return $this->belongsTo('App\User');
    }

    public function train()
    {
        //return $this->hasMany('App/Passenger');
        return $this->belongsTo('App\User');
    }
}
