<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Post</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    @if (count($errors) > 0)
        <div style="text-align:center;background-color:red;padding:5px;">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    @if (Session::has('success'))
        <div style="text-align:center;background-color:aqua;padding:5px;">
            <p>{{ Session::get('success') }}</p>
        </div>
    @endif

    <div class="container">
        <h2>Edit Post</h2>
        <form method="post" action="{{ route('/update-post',$post->id) }}" enctype="multipart/form-data">
            @csrf
            @if($post->image)
                <div class="form-group">
                    <label for="exampleFormControlFile1">Previous Image</label>
                    <img src="{{ asset('images/'.$post->image) }}" alt="Image" width="100px" height="100px">
                </div>
            @endif
            <div class="form-group">
                <label for="usr">Title:</label>
                <input type="text" class="form-control" name="title" value="{{ $post->title }}" id="usr">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Content</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="5">{{ $post->content }}</textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Image</label>
                <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>

</html>
