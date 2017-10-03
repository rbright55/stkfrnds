<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prediction extends Model
{
    //stock
	public function stock()
    {
        return $this->belongsTo('App\Stock');
    }
	//creator
	public function creator()
    {
        return $this->belongsTo('App\User');
    }
	//votes
	public function votes()
    {
        return $this->hasMany('App\PrdVotes');
    }
}