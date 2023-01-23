<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::with('comment')->get();
        return view('Dashboard.post.index', compact('posts'));
    }


    public function create()
    {
        return view('Dashboard.post.create');
    }


    public function store(PostRequest $request)
    {
        try {
            if ($request->has('image')) {
                $filePath = UploadImage('posts', $request->image);
            }
            $post=new Post();
            $post->image = $filePath;
            $post->author = auth()->user()->id;
            $post->title =$request->title;
            $post->content=$request->content;
            $post->save();
            return redirect()->route('posts.index')->with(['success'=>trans('massage.success')]);
        }catch (\Exception $exception){
            return redirect()->back()->withErrors(['error'=>'something went wrong please try later']);
        }
    }


    public function show($id)
    {
        try {
            $post=Post::with('comment')->findOrFail($id);
            return view('Dashboard.post.show',compact('post'));
        }catch (\Exception $exception){
            return redirect()->back()->withErrors(['error'=>'something went wrong please try later']);
        }
    }


    public function edit($id)
    {
        try {
            $post=Post::findorfail($id);
            return view('Dashboard.post.edit',compact('post'));
        }catch (\Exception $exception){
            return redirect()->back()->withErrors(['error'=>'something went wrong please try later']);
        }
    }

    public function update(PostRequest $request, $id)
    {
        try {
            $post=Post::findorfail($id);
            $post->update([
            $post->author = auth()->user()->id,
            $post->title =$request->title,
            $post->content=$request->content,
            ]);
            if ($request->has('image')) {
                $filePath = UploadImage('posts', $request->image);
                File::delete($post->image);
                $post->update([
                    $post->image = $filePath,
                ]);
            }
            return redirect()->route('posts.index')->with(['success'=>'post updated']);
        }catch (\Exception $exception){
            return redirect()->back()->withErrors(['error'=>'something went wrong please try later']);
        }
    }


    public function destroy($id)
    {
        try {
            $post=Post::findorfail($id);
            $deleteImage= Str::after($post->image,'images/') ;
            $deleteImage=base_path('public/images/'.$deleteImage);
            unlink($deleteImage);
            $post->delete();
            return redirect()->back();
        }catch (\Exception $exception){
            return redirect()->back()->withErrors(['error'=>'something went wrong please try later']);
        }
    }
}
