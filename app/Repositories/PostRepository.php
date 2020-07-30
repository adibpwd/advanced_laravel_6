<?php

namespace App\Repositories;

use App\Post;

class PostRepository
{
    public function allpost() 
    {
        return Post::get()->map( function($p){
            return [
                'judul' => $p['title'],
                'kontent' => $p['body'],
                'aktif' => $p['active'],
            ];
        });
    }

    public function showPostByID($id)
    {
        return Post::where('id', $id)->first();
    }

    public function updatePostByID($id)
    {
        return Post::where('id', $id)->update(request()->only(['title', 'active']));
    }
}