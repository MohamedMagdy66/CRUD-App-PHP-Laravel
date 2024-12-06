@extends('stickytop')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/style.js') }}"></script>
    <title>Home</title>
</head>

<body class="body">
    @section('stickybar')
        @auth
            <h1>Welcome, {{ auth()->user()->name }}!</h1>


            <div class="CreatePost">
                <h2>Create a New Post</h2>
                <form action="/CreatePost" method="POST" style="margin: 10px">
                    @csrf
                    <div class="postsinfo">
                        <input type="text" name="title" placeholder="Post Title">
                        <textarea name="body" placeholder="Body Content.."></textarea>
                    </div>
                    <button class="saveBtn">Save Post</button>

                </form>
            </div>
            <div class="AllPosts" style="border:3px solid #000;margin-top: 5px;text-align: center">
                <h2>All Posts</h2>
                @foreach ($posts as $post)
                    <div style="background-color: gray;padding: 10px;margin: 10px">
                        <h3>{{ $post['title'] }} by {{ $post->getUsername->name }}</h3>
                        {{ $post['body'] }}
                        <div class="PostButtons">
                            <p><a href="/edit-post/{{ $post->id }}" class="editBtn">Edit</a></p>
                            <form action="/delete-post/{{ $post->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="deleteBtn">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="registration" style="border:3px solid #000;" id="regForm">
                <form class="registerForm" action="/register" method="POST"
                    style="justify-content: space-between;margin: 7px;padding: 10px;">
                    @csrf
                    <!--csrf we have to use it every-time we use POST method
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                csrf :  protecting the visitors of our site from getting third party sides attack
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                that taking advantages from the cookies -->

                    <input type="text" name="name" placeholder="Name">
                    <input type="text" name="email" placeholder="Email">
                    <input type="password" name="password" placeholder="Password">
                    <button>Register</button>

                </form>
            </div>
            <div class="Login" style="border:3px solid #000; margin-top: 7px;" id="loginform">

                <form action="/Login" method="POST" style="justify-content: space-between;margin: 7px;padding: 10px;">
                    @csrf
                    <!--csrf we have to use it every-time we use POST method
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                csrf :  protecting the visitors of our site from getting third party sides attack
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                that taking advantages from the cookies -->
                    <input type="text" name="login-email" placeholder="Email">
                    <input type="password" name="login-password" placeholder="Password">
                    <button>Login</button>
                </form>
            </div>

        @endauth
    @endsection


</body>

</html>
