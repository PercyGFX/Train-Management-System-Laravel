<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LiveLocation extends Model
{
    public function train()
    {

        
        return $this->belongsTo(Train::class, 'train_id');
    }

    protected $fillable = [
        'train_id',
        'status', // Add the 'status' field to the fillable property
        'lat',
        'lng',
        'delay_time',
        'delay_status',
    ];
}
