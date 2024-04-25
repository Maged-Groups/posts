<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use App\Http\Requests\StorePostRequest;

use Carbon\Carbon;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return session('success');

       $posts = DB::select('select * from posts;');
    //    return $posts;

    return view('posts/index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        // Get all types in asc order
        // $post_types = DB::table('post_types')->orderBy('type', 'asc')->get(['type', 'id']);

        // OR by default it is asc
        $post_types = DB::table('post_types')->orderBy('type')->get(['type', 'id']);

        // Get all types in desc order
        // $post_types = DB::table('post_types')->orderBy('type', 'desc')->get(['type', 'id']);


        return view('posts.create', compact('post_types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {

        $data = $request->validated();

        $user_id  = Auth()->user()->id;

        $stamp = Carbon::now()->format('YndHisv');

        $file = $request->file('thumbnail');

        $extension = $file->getClientOriginalExtension();

         $file_name = $user_id . '-' . $stamp . '.' . $extension;
        //  return $file->getClientOriginalName();
        //  return $file_name;

        //  Move the uploaded file to the public/photos folder
        // $file->move('photos', 'post.png');

        //  Move the uploaded file to the public folder
        //  $file->move(public_path(), 'post.png');

        //  Move the uploaded file with a genereated name
        $thumbnail = $file->move('uploads\posts', $file_name);

        if ($thumbnail){

            $post_data = [
                'title'=> $data['title'],
                'body'=> $data['body'],
                'thumbnail'=>  $file_name,
                'post_type_id'=> $data['post_type_id'],
                'user_id'=> $user_id,
            ];

            // create the post
            if (DB::table('posts')->insert($post_data) ){
                return redirect()->route('posts.index')->with('success','Post Created Successfully');
            }

        }

        return back()->withErrors('Photo not uploaded');

        //  return $file;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        // Get only the post data
        $post = DB::table('posts')->find($id);

        // Get the post data with the user data
        $post = DB::table('posts')->join('users', 'users.id', 'posts.user_id')->where('posts.id', '=' ,$id)->select('thumbnail', 'body', 'name AS user_name', 'title', 'posts.id')->first();

        // return $post;

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
