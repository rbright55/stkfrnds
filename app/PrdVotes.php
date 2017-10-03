<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrdVotes extends Model
{
	protected $table = 'prediction_votes';

	//prediction
	public function prediction()
    {
        return $this->belongsTo('App\Prediction','prediction_id');
    }
	//voter
	public function voter()
    {
        return $this->belongsTo('App\User','user_id');
    }
	//stock
}