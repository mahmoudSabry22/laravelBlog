<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $with = ['comment_user'];

  protected $fillable = [
        'comment',
        'post_id',
        'user_id',
    ];

    public function comment_user()
    {
    	return $this->belongsTo('App\User','user_id','id');
    }
}
