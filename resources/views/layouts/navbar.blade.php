<!DOCTYPE html>
<html lang="en">

<head>
    <title>Blog Posts</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/nav.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ route('/post-list') }}">Blog Post</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link home" href="{{ route('/post-list') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link home" href="{{ url('/user/profile') }}">Profile</a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf

                        <input type="submit" class="mt-3" value="Log Out">


                    </form>
                </li>
            </ul>
        </div>
    </nav>

</body>
