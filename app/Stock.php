<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    //categories
	public function category()
    {
        return $this->belongsTo('App\StkCategory');
    }
	//watchers
	public function watchers()
    {
        return $this->hasMany('App\User');
    }
	//predictions
	public function predictions()
    {
        return $this->hasMany('App\Prediction');
    }
}