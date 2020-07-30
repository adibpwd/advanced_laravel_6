<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;


class Post extends Model
{

    use SoftDeletes;

    use Notifiable;
 
    // protected $dates = ['deleted_at'];

    protected $guarded = [];
    
    public function image()
    {
        return $this->morphOne( Image::class, 'imageable');
    }
   
    public function comments()
    {
        return $this->morphMany( Comment::class, 'commentable');
    }

    public function routeNotificationForSlack($notification)
    {
        return env('SLACK_HOOK');
    }
}
