@extends('layouts.header')

@section('title') index @endsection

@section('postData')
<div class="text-center m-2"><a href="{{route('posts.create')}}" class="btn btn-success"> Create Post</a></div>
<table class="table">
    <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Title</th>
            <th scope="col">Posted_by</th>
            <th scope="col">Created_at</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <th scope="row">{{$post->id}}</th>
            <td>{{$post->title}}</td>
            <td>{{$post->user->name}}</td>
            <td>{{$post->created_at}}</td>
            <td><a href="{{route('posts.show',$post['id'])}}" class="btn btn-info"> View</a></td>
            <td><a href="{{route('posts.edit',$post['id'])}}" class="btn btn-primary"> Edit</a></td>
            <td>
                <form action="{{route('posts.delete',$post['id'])}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-sm " onclick="return confirm('Press Ok to delete the row');" id="btnDelete">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<nav aria-label="...">
  <ul class="pagination justify-content-center">

    {{$posts->links()}}
  </ul>

</nav>
@endsection
