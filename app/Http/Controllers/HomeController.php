<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Category;
use App\Post;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::where('status',1)->paginate(2);
        return view('pages.index', [
            'posts' => $posts,
        ]);
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->orWhere('id', $slug)->firstOrFail();
        return view('pages.show', compact('post'));
    }

    public function tag($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();

        $posts = $tag->posts()->where('status', 1)->paginate(2);

        return view('pages.list', [
            'posts' => $posts,
        ]);
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $posts = $category->posts()->where('status', 1)->paginate(2);

        return view('pages.list', [
            'posts' => $posts,
        ]);
    }
}
