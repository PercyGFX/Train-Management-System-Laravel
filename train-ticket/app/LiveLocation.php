<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LiveLocation extends Model
{
    public function train()
    {
        return $this->belongsTo(Train::class, 'train_id');
    }
}
