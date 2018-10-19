<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $withCount = ['MLike'];
    

    protected $fillable = [
        'title',
        'content',
        'image',
        'keywords',
        'description',
        'category_id',
        'user_id',
    ];


    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }


    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'post_tags', 'post_id', 'tag_id');
        // return $this->belongsToMany(TheOtherModel, piviot_table, ThisModelForgenKey, TheOtherModelForgenKey);
    }

    public function Mcomments()
    {
        return $this->hasMany('App\Comment','post_id','id');
    }

    public function MLike()
    {
        return $this->hasMany('App\Like','post_id','id');
    }


    public function getTagsIds()
    {
        return $this->tags->pluck('id')->toArray();
    }

    public function showTags()
    {
        $tags = implode(', ', $this->tags->pluck('name')->toArray());
        return !empty($tags) ? $tags : 'N\A';
    }
}
