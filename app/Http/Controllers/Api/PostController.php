<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //
    public function getPosts(Post $post){
        return response()->json(['data'=>$post->get()],200);
    }

    public function createPost(Request $request,Post $post){
            $post->title=$request->title;
            $post->content=$request->content;
            $post->content_type=$request->content_type;
            $post->image_name=$request->image_name??null;
            $post->save();

            return response()->json([
                'message'=>'successfully created',
                'status'=>'success'
            ],200);


    }

    public function deletePost(Post $post,$id){
        $post = $post::find($id);

        if ($post) {
            $post->delete();
            return response()->json(['message' => 'Post deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Post not found'], 404);
        }
    }


    public function updatePost(Request $request,Post $post,$id){
        $post = $post::find($id);

        if ($post) {
            $post->update($request->all());
            return response()->json(['message' => 'Post deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Post not found'], 404);
        }
    }


}
