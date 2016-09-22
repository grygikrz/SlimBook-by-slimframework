<?php
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model as Eloquent;

/**
* 
*/
class Users extends Eloquent
{
	
		protected $table = 'users';

	
	public function posts()
    {

        return $this->hasMany('\App\Models\Posts', 'user_id', 'id');

    }

    

    public function comments()
    {

        return $this->hasMany('\App\Models\Comments', 'user_id', 'id');

    }

    public function friends()
    {

        return $this->hasMany('\App\Models\Friends', 'friend_id', 'id');

    }

}