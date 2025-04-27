<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Home';

        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = "Posts in $category->name";
        }

        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = "Posts by $author->name";
        }

        return view('main_pages/home', [
            'title' => $title, 
            'posts' => Post::oldest()->filter(request(['search', 'category', 'author']))
                       ->paginate(6)->withQueryString()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('main_pages/post_detail', ['title' => 'Post Detail', 'post' => $post]);
    }
}
