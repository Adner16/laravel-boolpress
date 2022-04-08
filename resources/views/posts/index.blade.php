
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elenco Post</title>
</head>
<body>
    <div class="container-sm">
    <a href="{{route('admin.posts.create')}}" class="btn text-right">Aggiungi</a>
        @foreach($posts as $post)
            <h2 class="text-center">{{$post->title}}</h2>
            <p>{{$post->content}}</p>
            <img src="{{$post->image}}" alt="">
            <br>
            @if($post->category)
                <span style="color:{{$post->category->color}}">{{$post->category->label}}</span>
            @endif

            @if($post->tags)
                @foreach($post->tags as $tag)
                    <span style="backgound-color:{{$tag->color}}">{{$tag->label}}</span>
                @endforeach
            @endif
            <a href="{{route('admin.posts.show', $post->id)}}" class='btn'>mostra</a>
            <a class="btn-small" href="{{route('admin.posts.edit', $post->id)}}">Modifica</a>
            <hr>
        @endforeach
    </div>
    
</body>
</html>