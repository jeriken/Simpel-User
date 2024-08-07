<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Traits\ApiResponses;
use App\Models\Post;

class PostController extends Controller
{
    use ApiResponses;

    public function index(): JsonResponse
    {
        //get all posts
        $posts = Post::latest()->paginate(5);

        //return collection of posts
        return $this->successResponse($posts, 200);
    }

    public function show($id): JsonResponse
    {
        //find post by ID
        $post = Post::find($id);

        //return single post 
        return $this->successResponse($post, 200);
    }

    public function store(PostRequest $request): JsonResponse
    {

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/posts', $image->hashName());

        //create post
        $post = Post::create([
            'user_id'   => Auth::id(),
            'image'     => $image->hashName(),
            'title'     => $request->title,
            'content'   => $request->content,
        ]);

        //return response
        return $this->successResponse($post, 200);
    }

    public function update(PostRequest $request, $id)
    {
        //find post by ID
        $post = Post::find($id);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/posts', $image->hashName());

        //delete old image
        Storage::delete('public/posts/' . basename($post->image));

        //update post with new image
        $post->update([
            'user_id'   => Auth::id(),
            'image'     => $image->hashName(),
            'title'     => $request->title,
            'content'   => $request->content,
        ]);

        //return response
        return $this->successResponse($post, 200);
    }

    public function destroy($id)
    {

        //find post by ID
        $post = Post::find($id);

        //delete image
        Storage::delete('public/posts/'.basename($post->image));

        //delete post
        $post->delete();

        //return response
        return $this->successResponse(null, 200);
    }

}
