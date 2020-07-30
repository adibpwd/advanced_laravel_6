<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Comment extends Model
{
    use Notifiable;
    
    protected $guarded = [];

    public function commentable()
    {
        return $this->morphTo();
    }
}
