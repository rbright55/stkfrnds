<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
	//roles
	public function group_roles()
    {
        return $this->belongsTo('App\GroupRole','group_role_id');
    }
	//predictions shared with the group
    //members
    public function members()
    {
    	return $this->hasManyThrough('App\User','group_users','group_id','');
    }
	//admins
}