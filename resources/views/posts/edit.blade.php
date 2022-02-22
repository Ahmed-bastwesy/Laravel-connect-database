@extends('layouts.header')

@section('title') update Post @endsection
@section('postData')


<form method="post" action="{{route('posts.update',$posts['id'])}}" class="mt-5">
    @csrf
    @method('patch')
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{$posts->title}}">
    </div>
    <div class="form-group">
        <label for="Description">Description</label>
        <textarea class="form-control" name="description"> {{$posts->description}}</textarea>
    </div>
    <div class="form-group">
        <label for="postCreator">Post Creator</label>
        <select name="user_id" class="form-control" id='postCreator' >
            <option value="{{$posts->user->id}}" selected>{{$posts->user->name}}</option>
            @foreach($users as $user)
            <option value="{{$user->id}}"> {{$user->name}} </option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
</form>

@endsection
