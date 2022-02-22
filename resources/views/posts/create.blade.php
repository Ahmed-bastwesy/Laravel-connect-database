@extends('layouts.header')

@section('title') Create Posts  @endsection
@section('postData')

<form method="POST" action="{{route('posts.store')}}" class="mt-5">
    @csrf
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" class="form-control" id="title"  >
  </div>
  <div class="form-group">
    <label for="Description">Description</label>
    <textarea class="form-control" name="description"> </textarea>
  </div>
  <div class="form-group">
    <label for="postCreator">Post Creator</label>
    <select name="user_id" class="form-control" id='postCreator' >
        @foreach($users as $user)
        <option value="{{$user->id}}"> {{$user->name}} </option>
        @endforeach
    </select>
  </div>
  <button type="submit" class="btn btn-success">Create</button>
</form>

@endsection
