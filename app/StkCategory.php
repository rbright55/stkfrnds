<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StkCategory extends Model
{
	protected $table = 'stock_categories';
	
    //stock
	public function stocks()
    {
        return $this->hasMany('App\Stock');
    }
}