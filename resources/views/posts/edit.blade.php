@extends('layouts.app')

@section('title') Edit @endsection

@section('content')
        <form action="{{route('posts.update',$post)}}" method="post">
             @csrf
             @method('PUT')
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input name="title" type="text"  class="form-control" id="exampleFormControlInput1"  value=" {{$post->title}}">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" > {{$post -> description}}</textarea>  
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Post Creator</label>
                <select name="post_creator" class="form-control">
                    @foreach ($users as $user)
                        <option value="{{$user->id}}" selected>{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-success">Edit Post</button>
            
        </form>
@endsection
    
