<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\User;

class Notes extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'content'
    ];

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function images(){
        return $this->hasMany(Images::class, 'id_nota');
    }
}
