<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Http\Requests\StorePostRequest;

use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        // $allPosts = Post::where('title','Test')->get();
        $allPosts = Post::with('user')->simplepaginate(20);//to retrieve all records

        return view('posts.index', [
            'allPosts' => $allPosts
        ]);
    }

    public function create()

    {
        $posts = User::all();

        return view('posts.create',[
            'users' => $posts
        ]);
    }

    public function store(StorePostRequest $request)
    {
        $request->only('id', 'title', 'description','created_at','updated_at','user_id');

        request()->validate([
            'title' => ['unique:App\Models\Post'],
         
        ],[
            'title.unique' => 'It is already exist',
        ]);

        $data = $request->all();
     //dd($request);
        // Post::create($data);
        Post::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id' => $data['post_creator'],
            // will be ignored cause they aren't in fillable
            // 'un_known_column' => 'ajshdahsouid',
            // 'id' => 70,
        ]);// insert into (title,descripotion) values ('asdasd')

        // dd('test'); any logic after dd won't be executed
        //the logic to store post in the db
        return redirect()->route('posts.index');
    }
    public function show($slug)
    {
        $post = Post::where('slug',$slug)->first();
       // dd( $post);
        $posts = User::where('id',$post->user_id)->first();
        //query in db select * from posts where id = $postId
        return view('posts.show',['post'=> $post,'users' => $posts]);
    }

    public function edit($postId)
    {
        //query in db select * from posts where id = $postId
        $post = Post::where('id',$postId)->first();
        $posts = User::all();

        //dd( $post);
        return view('posts.edit',['post'=> $post,'users' => $posts]);
    }


    public function update(post $post,StorePostRequest $request)
    {
       // $edit = post::find($post['id']);
        $post->title = $request['title'];
        $post->description = $request['description'];
        $post->user_id = $request['post_creator'];
        $post->save();
        return redirect()->route('posts.index');
        }
        public function destroy($postId)
    {
        $post = Post::where('id',$postId)->first();

        $post->delete();
        return redirect()->route('posts.index');
    }
}
