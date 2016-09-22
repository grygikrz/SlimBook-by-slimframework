<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Model as Eloquent;

/**
* 
*/
class Posts extends Eloquent
{
	
		protected $table = 'posts';
		public $timestamps = false;

	    
	public function comments()
    {

        return $this->hasMany('\App\Models\Comments', 'post_id','id');

    }
    public function users()
    {

        return $this->hasMany('\App\Models\Users','id','user_id');

    }

    public function friends()
    {

        return $this->belongsTo('\App\Models\Friends', 'friend_id', 'id');

    }
}