<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    //

    public function notes(){
        return $this->belongsTo(Notes::class);
    }
}
