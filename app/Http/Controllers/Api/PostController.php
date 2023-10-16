<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::query()->orderBy('id', 'desc')->get();
        return response()->json($posts);
    }
    public function store(Request $request) {
        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return response()->json($post);
    }

    public function show($id) {
        $post = Post::findOrFail($id);
        return response()->json($post);
    }

    public function update(Request $request,$id) {
        $post = Post::findOrFail($id);
        $post->update($request->all());

        return response()->json($post);
    }

    public function destroy($id){
        Post::findOrFail($id)->delete();

        return response()->json(['message' => 'Yazı Silindi']);
    }
}
