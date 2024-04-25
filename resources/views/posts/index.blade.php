@extends('layouts.main')

@section('content')

@if (session('success'))
    <div class="px-2 py-3 rounded-md shadow-md bg-green-200 text-green-950">
        {{ session('success') }}
    </div>
@endif

<div class="overflow-x-auto">
  <table class="table">
    <!-- head -->
    <thead>
      <tr>
        <th>Thumbnail</th>
        <th>Title</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>

     @foreach($posts as $post)
     <tr>
         <td>
         <div class="mask mask-squircle w-12 h-12">
                <img src="{{asset('uploads/posts') . '/' .  $post->thumbnail}}" alt="{{$post->title}}" />
              </div>
         </td>
        <td>{{$post->title}}</td>
        <td>
            <div>
                <a href='{{route("posts.show", $post->id)}}' class='btn btn-neutral'>
                    <i class="fa fa-eye"></i>
                </a>
                <span class='btn btn-primary'>
                    <i class="fa fa-pencil"></i>
                </span>
                <span class='btn btn-secondary'>
                    <i class="fa fa-trash"></i>
                </span>
            </div>
        </td>
      </tr>
     @endforeach

    </tbody>
  </table>




  <div id="posts_container"></div>


  <script>

    var data = {{ Js::from($posts) }};

    data.forEach(post=>posts_container.innerHTML += `<li>${post.title}</li>`)


    console.log(data);
  </script>
</div>

@endsection
