<?php
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model as Eloquent;

/**
* 
*/
class Friends extends Eloquent
{
	
		protected $table = 'friends';

	
	public function users()
    {

        return $this->belongsTo('\App\Models\Users', 'friend_id', 'id');

    }

        public function posts()
    {

        return $this->hasOne('\App\Models\Posts', 'user_id', 'id');

    }

}