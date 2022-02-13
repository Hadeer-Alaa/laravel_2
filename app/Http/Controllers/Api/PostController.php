<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
class PostController extends Controller
{
    public function index()
    {
        return PostResource::collection(Post::paginate(3));
    }
    public function store(StorePostRequest $request)
    {


        $data = $request->all();
  
        Post::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id' => $data['post_creator'],
          
        ]);
     
    
    }

    public function show($id)
    {
        $post = Post::where('id',$id)->first();

        return new PostResource( $post);
    }
    
}
