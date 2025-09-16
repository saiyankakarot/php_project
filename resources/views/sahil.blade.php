<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime App</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div style="max-width: 1200px; margin: 0 auto; padding: 20px;">
        @auth
        <div style="text-align: center; margin-bottom: 40px;">
            <h1 style="font-size: 2em; margin-bottom: 10px;">Welcome to Anime App!</h1>
            <p style="margin-bottom: 20px;">Congrats, you're Registered!</p>
            <form action="/logout" method="POST">
                @csrf
                <button style="padding: 10px 20px; background-color: #007bff; color: white; border: none; border-radius: 5px;">Log out</button>
            </form>
        </div>
        @if($errors->any())
        <div style="color: red; margin-bottom: 20px; text-align: center;">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div style="border: 1px solid #ccc; padding: 20px; margin-bottom: 40px; background-color: white;">
            <h2 style="margin-bottom: 20px;">Create a New Post</h2>
            <form action="/create-post" method="POST">
                @csrf
                <input type="text" name="title" placeholder="Post Title" style="width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px;"><br>
                <textarea name="body" placeholder="Share your anime thoughts..." style="width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px; height: 100px;"></textarea><br>
                <button style="padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 5px;">Submit Post</button>
            </form>
        </div>

        <div style="border: 1px solid #ccc; padding: 20px; background-color: white;">
            <h2 style="margin-bottom: 20px;">All Posts</h2>
            @foreach($posts as $post)
            <div style="border: 1px solid #ddd; padding: 15px; margin-bottom: 15px; background-color: #f9f9f9;">
                <h3 style="margin-bottom: 5px;">{{$post['title']}}</h3>
                <p style="font-size: 0.9em; color: #666; margin-bottom: 10px;">by {{$post->user->name}}</p>
                <p style="margin-bottom: 10px;">{{$post['body']}}</p>
                <a href="/edit-post/{{$post->id}}" style="padding: 5px 10px; background-color: #ffc107; color: black; text-decoration: none; border-radius: 3px; margin-right: 10px;">Edit</a>
                <form action="/delete-post/{{$post->id}}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button style="padding: 5px 10px; background-color: #dc3545; color: white; border: none; border-radius: 3px;">Delete</button>
                </form>
            </div>
            @endforeach
        </div>

        @else
        <div style="max-width: 400px; margin: 0 auto;">
            <div style="border: 1px solid #ccc; padding: 20px; margin-bottom: 20px; background-color: white;">
                <h1 style="text-align: center; margin-bottom: 20px;">Register</h1>
                <form action="/register" method="POST">
                    @csrf
                    <input name="name" type="text" placeholder="Username" style="width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px;"><br>
                    <input name="email" type="email" placeholder="Email" style="width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px;"><br>
                    <input name="password" type="password" placeholder="Password" style="width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px;"><br>
                    <button style="width: 100%; padding: 10px; background-color: #28a745; color: white; border: none; border-radius: 5px;">Register</button>
                </form>
            </div>

            <div style="border: 1px solid #ccc; padding: 20px; background-color: white;">
                <h2 style="text-align: center; margin-bottom: 20px;">Login</h2>
                <form action="/login" method="POST">
                    @csrf
                    <input name="loginname" type="text" placeholder="Username" style="width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px;"><br>
                    <input name="loginpassword" type="password" placeholder="Password" style="width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px;"><br>
                    <button style="width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 5px;">Log in</button>
                </form>
            </div>
        </div>
        @endauth
    </div>
</body>
</html>
