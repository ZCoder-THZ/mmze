<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //
    public function getPosts(Post $post){
        $posts = $post->get();

        foreach ($posts as $post) {
            if (strpos($post->image_name, 'https://') !== 0) {
                // Get the file name from the original image_name
                $imageName = basename($post->image_name);

                // Set the image path to the local directory using public_path
                $post->image_name = asset('images') . '/' . $imageName;
            }
        }

        return response()->json(['data' => $posts], 200);
    }

    public function createPost(Request $request,Post $post){
        $post->title=$request->title;
        $post->content=$request->content;
        $post->content_type=$request->content_type;
        $post->image_name=$request->image_name??'';
        if($request->file('image_name')){
            $image = $request->file('image_name');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName); // Move the uploaded file to a directory

            $post->image_name=$imageName??null;

        }

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
