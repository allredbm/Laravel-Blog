<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\PostImage;
use Auth;
use Storage;

class PostController extends Controller
{
    /**
     * Get all posts
     */
    public function getAllPosts() {
        $posts = Post::with('post_images')->orderBy('createdAt', 'desc')->get();

        return response()->json(['error' => false, 'data' => $posts]);
    }

    public function createPost(Request $request) {
        $user = Auth::user;
        $title = $request->title();
        $category = $request->category_id();
        $postBody = $request->post_body();
        $images = $request->images();

        $post = Post::create([
            'title' => $title,
            'author_id' => $user->id,
            'category_id' => $category,
            'post_body' => $postBody,
        ]);

        foreach($images as $image) {
            $imagePath = Storage::disk('uploads')->put($user->email . '/posts', $image);
            PostImage::create([
                'post_image_caption' => $title,
                'post_image_path' => $imagePath,
                'post_id' => $post->id
            ]);
        }

        return response()->json(['error' => false, 'data' => $post]);
    }
}
