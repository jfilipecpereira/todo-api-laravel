<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    //


    public function useres(){
        return $this->belongsTo(User::class);
    }

    public function images(){
        return $this->hasMany(Images::class);
    }
}
