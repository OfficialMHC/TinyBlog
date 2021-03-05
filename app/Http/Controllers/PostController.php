<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {
        $inputs = \request()->validate([
            'title' => 'required|min:5|max:255',
            'post_image' => 'file',
            'body' => 'required'
        ]);

        if(\request('post_image')) {
            $inputs['post_image'] = \request('post_image')->store('images/post');
        }

        auth()->user()->posts()->create($inputs);

        \session()->flash('create-message', 'Post has been Created Successfully! Post Title Is : ' . $inputs['title']);

        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('blog-post', ['post' => $post]);
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        $inputs = \request()->validate([
            'title' => 'required|min:5|max:255',
            'post_image' => 'file',
            'body' => 'required'
        ]);

        if(\request('post_image')) {
            $inputs['post_image'] = \request('post_image')->store('images/post');
            $post->post_image = $inputs['post_image'];
        }

        $post->title = $inputs['title'];
        $post->body = $inputs['body'];

        // Update and also change the owner then use this below because this is a relation between the user and post.
//        auth()->user()->posts()->save($post);

        $post->update();

        session()->flash('update-message', 'Post has been UPDATED Successfully! Post Title Is : ' . $post->title);
        return redirect()->route('post.index');
    }

    public function destroy(Post $post, Request $request)
    {
        $post->delete();
        $request->session()->flash('delete-message', 'Post has been DELETED Successfully! Post Title Was : ' . $post->title);
        return back();
    }
}
