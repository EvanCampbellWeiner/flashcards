<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Set extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'numberOfCards', 'userID'
    ];

    public function owner() {
        return $this->belongsTo('App\User', 'userID');
    }
}
