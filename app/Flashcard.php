<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flashcard extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'question', 'answer', 'setID'
    ];

    public function in_set() {
        return $this->belongsTo('App\Set', 'setID', 'id');
    }
}
