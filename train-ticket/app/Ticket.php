<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public function passenger()
    {
        //return $this->hasMany('App/Passenger');
        return $this->belongsTo('App\Passenger');
    }
    public function train()
    {
        return $this->belongsTo('App\Train');
    }

    protected $fillable = [
        'passenger_id',
        'train_id',
        'qty',
        'discount',
        'ticket_price',
        'totle_price',
        'train_name',
        'status',
    ];
}
