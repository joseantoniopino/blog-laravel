<?php

namespace App\Http\Controllers\Web;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function blog(){
        $posts = Post::orderBy('id', 'DESC')->whereStatus('PUBLISHED')->paginate(3);
        return view('web.posts', compact('posts'));
    }

    public function category($slug){
        $category = Category::whereSlug($slug)->pluck('id')->first();
        $posts = Post::whereCategoryId($category)
            ->whereStatus('PUBLISHED')
            ->orderBy('id', 'DESC')->paginate(3);
        return view('web.posts', compact('posts'));
    }

    public function tag($slug){
        $posts = Post::whereHas('tags', function ($query) use ($slug){
            $query->where('slug', $slug);
        })
        ->whereStatus('PUBLISHED')
        ->orderBy('id', 'DESC')->paginate(3);

        return view('web.posts', compact('posts'));
    }

    public function post($slug){
        $post = Post::whereSlug($slug)->first();
        return view('web.post', compact('post'));
    }
}
