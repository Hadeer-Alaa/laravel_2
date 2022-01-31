@extends('layouts.app')

@section('title') Show @endsection

@section('content')
        <form action="{{route('posts.show',$post)}}" method="get">
             @csrf
             <div class="card">
  <div class="card-header">
    Post Info
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
   <p><span class ="font-weight-bold"> Title :- </span> {{$post->title}}   </p>
   <p><span class ="font-weight-bold"> Description :</span> {{$post -> description}} </p>

      </blockquote>
  </div>
</div>
<br>
<br>
<br>
<br>
<div class="card">
  <div class="card-header">
    Post Creator Info
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
    <p><span class ="font-weight-bold"> Name :- </span> {{$users->name}}   </p>
   <p><span class ="font-weight-bold"> Email :</span> {{$users -> email}} </p>
   <p><span class ="font-weight-bold"> Created At :</span> {{ $post->created_at->format('D d M Y ') }}

 </p>

    </blockquote>
  </div>
</div>
            
        </form>
@endsection
    
