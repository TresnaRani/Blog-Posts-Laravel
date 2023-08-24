<?php

namespace App\Http\Controllers;

use App\Models\Post;
//model for post
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    //index page
    public function index()
    {
        $posts = Post::latest()->paginate(5);
        return view('posts.index', ['posts' => $posts]);
    }
    //create page
    public function create()
    {
        return view('posts.create');
    }
    //store page
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required|min:10',
            'image' => 'nullable|mimes:jpg,png,jpeg|max:5048'
        ]);
        if ($request->hasFile('image')) {
            $newImageName = time() . '-' . $request->title . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
        } else {
            $newImageName = NULL;
        }
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $newImageName,
            'user_id' => auth()->user()->id
        ]);
        Session::flash('success', 'Post added successfully');
        return back();
    }
    //show page
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', ['post' => $post]);
    }
    //edit page
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', ['post' => $post]);
    }
    //update page
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required|min:10',
            'image' => 'nullable|mimes:jpg,png,jpeg|max:5048'
        ]);
        if ($request->hasFile('image')) {
            $newImageName = time() . '-' . $request->title . '.' . $request->image->extension();
            //if file is exist then delete
            if (file_exists(public_path('images') . '/' . $newImageName)) {
                unlink(public_path('images') . '/' . $newImageName);
            }
            $request->image->move(public_path('images'), $newImageName);
        } else {
            $newImageName = Post::find($id)->image;
        }
        Post::where('id', $id)
            ->update([
                'title' => $request->title,
                'content' => $request->content,
                'image' => $newImageName,
            ]);

        Session::flash('success', 'Post updated successfully');
        return back();
    }
    //destroy page
    public function destroy($id)
    {
        $post = Post::find($id);
        //if file is exist then delete
        if ($post->image != NULL) {
            if (file_exists(public_path('images') . '/' . $post->image)) {
                unlink(public_path('images') . '/' . $post->image);
            }
        }
        $post->delete();
        Session::flash('success', 'Post deleted sucessfully');
        return back();
    }
    public function search(Request $request)
    {
        $name = $request->name;
        $posts = Post::where('title', 'like', '%' . $name . '%')->orWhere('content', 'like', '%' . $name . '%')->paginate(5);
        return view('posts.index', ['posts' => $posts]);
    }
}
