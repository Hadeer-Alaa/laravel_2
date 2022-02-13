@extends('layouts.app')

@section('title')Index @endsection

@section('content')
        <div class="text-center">
            <a href="{{ route('posts.create') }}" class="btn btn-success">Create Post</a>
        </div>

        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>

                <th scope="col">Posted By</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
             @foreach ($allPosts as $post)
             {{-- @dd($post->user()) --}}
              <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>{{ $post->title }}</td>
                <td>{{ $post->slug }}</td>
                <td>{{ isset($post->user) ? $post->user->name : 'Not Found' }}</td>
                {{-- @dd($post->created_at) carbon object --}}
                <td> {{$post->created_at->format('d-m-Y')}}</td>
                <td>
              
                    <a href="{{route('posts.show',$post->slug )}}" class="btn btn-info">View</a>
                    <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary">edit</a>
                 <form action="{{route('posts.destroy',$post->id)}}" method="post" class="d-inline"> 
                    @csrf
             @method('DELETE')
             <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure delete?')">Delete</button>
</form>


                  </td>
              </tr>
              @endforeach
            </tbody>
          </table>


        @if ($allPosts->links()->paginator->hasPages())
    <div class="mt-4 p-4 box has-text-centered">
        {{ $allPosts->links() }}
    </div>
@endif
@endsection
    