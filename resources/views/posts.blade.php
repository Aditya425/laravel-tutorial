<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./app.css">
    {{-- <script src="./app.js"></script> --}}
    <title>My Blog</title>
</head>
<body>
    <?php foreach($posts as $post): ?>
    <article>
        <a href="/posts/<?= $post->slug ?>"><h1>{{ $post->title }}</h1></a>
        <div>
            {{ $post->excerpt }}
        </div>
    </article>

    <?php endforeach; ?>
</body>
</html>