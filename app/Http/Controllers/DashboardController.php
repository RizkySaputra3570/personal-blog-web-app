<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard_pages/dashboard_index', [
            'title' => 'Dashboard',
            'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard_pages/dashboard_create', [
            'title'      => 'Create Post',
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'      => 'required|max:255',
            'category'   => 'required',
            'post_image' => 'image|file|max:8192',
            'body'       => 'required'
        ]);

        if ($request->file('post_image')) {
            $validatedData['post_image'] = $request->file('post_image')->store('storage/images', 'public');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['category_id'] = (int) $request->input('category');
        $validatedData['slug'] = Str::slug($request->title, '-');
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 100);
        Post::create($validatedData);
        return redirect('/dashboard')->with('success', 'New Post Has Been Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard_pages/dashboard_detail', [
            'title' => 'Post Detail',
            'post'  => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('dashboard_pages/dashboard_edit', [
            'title'      => 'Edit Post',
            'post'       => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title'       => 'required|max:255',
            'category_id' => 'required',
            'post_image'  => 'image|file|max:8192',
            'body'        => 'required'
        ]);

        if ($request->slug != $post->slug) {
            $validatedData['slug'] = 'required|unique:posts';
        }

        if ($request->file('post_image')) {
            if ($request->oldImage) {
                Storage::delete("/storage/images/$request->oldImage");
            }

            $validatedData['post_image'] = $request->file('post_image')->store('storage/images', 'public');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['category_id'] = (int) $request->input('category');
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 100);
        Post::where('id', $post->id)->update($validatedData);
        return redirect('/dashboard')->with('success', 'Post Has Been Updated');    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->post_image) {
            Storage::delete("/storage/images/$post->post_image");
        }

        $post::where('id', $post->id)->delete();        
        return redirect('/dashboard')->with('success', 'Post Has Been Deleted');    
    }
}
