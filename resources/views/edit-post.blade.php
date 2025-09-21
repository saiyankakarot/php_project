<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post - Anime App</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div style="max-width: 800px; margin: 0 auto; padding: 20px;">
        <div style="border: 1px solid #ccc; padding: 20px; background-color: white;">
            <h1 style="text-align: center; margin-bottom: 20px;">Edit Post</h1>
            <form action="/edit-post/{{$post->id}}" method="POST">
                @csrf
                @method('PUT')
                <input type="text" name="title" value="{{$post->title}}" style="width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px;"><br>
                <textarea name="body" style="width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px; height: 200px;">{{$post->body}}</textarea><br>
                <button style="width: 100%; padding: 10px; background-color: #28a745; color: white; border: none; border-radius: 5px;">Save Changes</button>
            </form>
        </div>
    </div>
</body>
</html>
