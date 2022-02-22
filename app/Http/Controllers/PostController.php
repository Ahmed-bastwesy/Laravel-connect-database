<?php

namespace App\Http\Controllers;
use App\Http\Requests\UpdateRequest;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Illuminate\View\ViewName;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon as Carbon;
use Symfony\Contracts\Service\Attribute\Required;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $posts= post::paginate(7);
        return view(view: 'posts.index', data: [
            'posts' => $posts,
        ]);
    }

    public function create()
    {
        $users= User::all();
        return view(view: 'posts.create' , data: [
            'users' => $users ,
        ]);
    }

    public function show($postId)
    {
        $posts = Post::find($postId);
        $users = User::find($posts->user_id);
        return view(view: 'posts.show', data: [
            'posts' => $posts,
            'users' => $users,
        ]);
    }

    public function edit($postId)
    {
        $posts =Post::find($postId);
        $users = User::all();
        return view("posts.edit",['posts'=> $posts , 'users' => $users,]);
    }

    public function update($id , UpdateRequest $request)
    {
        Post::find($id)->update($request->all());
        return redirect()->route('posts.index');

    }

    public function store(PostRequest $request){


        // to get data entered by user
        $requestData= request()->all();

        //save data into table Post
        Post::create($requestData);

        return redirect()->route('posts.index');
    }

    public function destroy(Request $request, $postId)
    {
      Post::find($postId)->delete($request->all());
      return redirect()->route('posts.index');
    }



}
