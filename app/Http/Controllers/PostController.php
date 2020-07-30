<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Channel;
use App\Post;
use App\QueryFilters\Filters;
use App\QueryFilters\Sort;
use Illuminate\Pipeline\Pipeline;
use App\Repositories\PostRepository;

class PostController extends Controller
{
    private $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }
    public function create() 
    {
        return view('post.create');
    }

    public function pipeline() 
    {
        // dd(request());
        $pipes = [
            Filters::class,
        ];

        $p = Post::query();

        $posts = app(Pipeline::class)->send($p)->through($pipes)->then(
            fn ($builder) => $builder->get()
        );

        return view('post.pipeline', compact('posts'));
    }

    public function all()
    {
        $all_post = $this->postRepository->allpost();

        dd($all_post);
    }

    public function onepost($id)
    {
        $onepost = $this->postRepository->showPostByID($id);
        if(!$onepost)
        {
            dd('post tidak ditemukan');
        }
        
        dd($onepost);
    }

    public function update($id)
    {
        $update_post = $this->postRepository->updatePostByID($id);

        return redirect('onepost/'.$id);
    }

    public function convert($size)
    {
        $unit=array('b','kb','mb','gb','tb','pb');
        return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
    }

    public function rutime($ru, $rus, $index) {
        return ($ru["ru_$index.tv_sec"]*1000 + intval($ru["ru_$index.tv_usec"]/1000))
         -  ($rus["ru_$index.tv_sec"]*1000 + intval($rus["ru_$index.tv_usec"]/1000));
    }

    public function postAllGenerator($amount)
    {
        for ($i=0; $i < $amount; $i++) {
            Factory(Post::class)->create();
        }
    }
    
    public function chunkPost() 
    {
        $amount = Post::count();

        Post::chunk(20, function ($posts) {
            foreach ($posts as $p) {
                // echo $p['title'] . ' || ';
                echo 'h';
            }
        });


        $alert = $this->convert(memory_get_usage());

        return "<script>alert('Memory terpakai : $alert lamanya adalah ');</script>";
    }

    public function cursorPost()
    {

        foreach (Post::cursor() as $p) {
            echo $p['title'] . ' || ';
        }
        
        
        $alert = $this->convert(memory_get_usage());

        return "<script>alert('Memory terpakai : $alert ');</script>";
    }

    public function phpGenerator()
    {
        // $amount = Post::count();
        $amount = 100;
        foreach ($this->postAllGenerator($amount) as $result) {
            dump($result);
        }

        $alert = $this->convert(memory_get_usage());

        return "<script>alert('Memory terpakai : $alert ');</script>";
    }

    public function Post10() {
        $post = Post::limit(10)->get();

        echo '<a href="/trash-post">trash post</a>';
        dd($post);

    }

    public function destroy($id)
    {
        Post::where('id', $id)->delete();

        return redirect('/10-post-awal');
    }

    public function trash() 
    {
        $post = Post::onlyTrashed()->limit(10)->get();

        echo '<a href="/10-post-awal">10 post</a>';
        dd($post);
    }

    public function restore($id)
    {
        $post = Post::where('id', $id)->restore();

        return redirect('/10-post-awal');
    }

   
}
