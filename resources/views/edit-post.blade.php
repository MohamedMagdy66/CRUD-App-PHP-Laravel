@extends('stickytop')
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/style.js') }}"></script>
    <title>Document</title>
</head>

<body class="body">
    @section('stickybar')
        <div class="CreatePost">
            <h1>Edit {{ auth()->user()->name }}'s Post</h1>
            <form action="/edit-post/{{ $post->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="postsinfo">
                    <input type="text" name="title" value="{{ $post->title }}">
                    <textarea name="body">
                    {{ $post->body }}
                    </textarea>
                </div>
                <button class="saveBtn">Save Changes</button>
            </form>
        </div>
    @endsection
</body>

</html>
