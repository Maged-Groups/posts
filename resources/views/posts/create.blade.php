@extends('layouts.main')

@section('content')
<div class="max-w-md m-auto">


    <h2 class="text-2xl font-extrabold text-center mb-3 ">Create Your Post</h2>

    <form method="post" enctype="multipart/form-data" action="{{ route('posts.store') }}" class="flex flex-col gap-3">
        <label class="input input-bordered flex items-center gap-2">
            <i class="fa fa-pencil"></i>
            <input name='title' type="text" class="grow" placeholder="title" value="{{ @old('title') }}" />
        </label>
            @error('title')
                <p class="text-red-600">{{ $message }}</p>
            @enderror

        <label class="flex gap-2 border p-2">
            <i class="fa fa-pencil"></i>
            <textarea name='body' class="w-full" placeholder="body">
                {{ @old('body') }}
            </textarea>
        </label>

        @error('body')
            <p class="text-red-600">{{ $message }}</p>
         @enderror


        <label class="input input-bordered flex items-center gap-2">
            <i class="fa fa-pencil"></i>

            <select name='post_type_id' class="select select-primary w-full max-w-xs">
                <option>Select Post Type</option>

                @foreach ($post_types as $post_type )
                    <option   @if(@old('post_type_id') == $post_type->id ) selected  @endif   value="{{ $post_type->id }}">{{ $post_type->type }}</option>
                @endforeach

              </select>
        </label>

        @error('post_type_id')
        <p class="text-red-600">{{ $message }}</p>
         @enderror

        <label class="input input-bordered flex items-center gap-2">
            <i class="fa fa-pencil"></i>

            <input name='thumbnail' type="file" class="file-input file-input-bordered file-input-secondary w-full max-w-xs" />

        </label>

        @error('thumbnail')
            <p class="text-red-600">{{ $message }}</p>
         @enderror

        @csrf

        <input type="hidden"  name='_token' value="{{ csrf_token() }}">

        <button class="btn btn-primary">Create</button>



        @if ($errors->any())
            @foreach ($errors->all() as $error )
                <p class="alert bg-red-300 text-red-900">{{ $error }}</p>
            @endforeach
        @endif

    </form>
</div>
@endsection
