<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <title>Post Details</title>
</head>
<body>
    <h1>Post Details</h1>
    <div class="details">
        <p><b>Title : </b>{{ $post->title }}</p>
        <p><b>Content : </b>{{ $post->content }}</p>
        <p><b>Posted By : </b>{{ $post->user->name }}</p>
        @if($post->image)
            <p><b>Image : </b><img src="{{ asset('images/'.$post->image) }}" alt="Image" width="100px" height="100px"></p>
        @else
            <p><b>Image : </b>N/A</p>
        @endif
    </div>
</body>
</html>
