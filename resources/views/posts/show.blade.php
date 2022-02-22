
@extends('layouts.header')
@section('title') User Data  @endsection
@section('postData')

    <div class="row bg-light mt-5 border border-dark">
        <p>Post info</p>
    </div>
    <div >
        <h3 >title : {{$posts->title}} </h3>

        <h3 >Description : {{$posts->description}} </h3>
    </div>

    <div class="row bg-light mt-5 border border-dark">
        <p>Post Creator info</p>
    </div>
    <div >
        <h3>name : {{$users->name}} </h3>
        <h3>email : {{$users->email}} </h3>
        <h3>created_at: {{$users->created_at}} </h3>
    </div>
@endsection
