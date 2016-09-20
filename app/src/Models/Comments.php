<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Model as Eloquent;

/**
* 
*/
class Comments extends Eloquent
{

	protected $table = 'comments';



	    public function users()
    {
        return $this->belongsTo('\App\Models\Users', 'user_id', 'id');
    }

    	    public function posts()
    {

        return $this->belongsTo('\App\Models\Posts', 'post_id', 'id');

    }
   
}