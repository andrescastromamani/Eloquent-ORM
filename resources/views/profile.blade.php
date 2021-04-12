<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $user->name }}</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body>
    <div class="container shadow">
        <div class="row">
            <div class="col mt-3 shadow">
                <img src="{{ $user->image->url }}" alt="image" class="float-left rounded-circle">
                <h1>{{ $user->name }}</h1>
                <span>{{ $user->email }}</span> <br>
                <strong>Instagram: </strong>{{ $user->profile->instagram }} <br>
                <strong>github: </strong>{{ $user->profile->github }} <br>
                <strong>web: </strong>{{ $user->profile->web }} <br>
                <p>
                    <strong>Pais: </strong>{{ $user->location->country }} <br>
                    <strong>Nivel:
                        @if ($user->level)
                            <a href="#">{{ $user->level->name }}</a>
                        @else
                            ---
                        @endif
                    </strong>
                </p>
                <hr>
                <p>
                    <strong>grupo:</strong>
                    @forelse ($user->groups as $group)
                    <span class="bg-primary p-1">{{ $group->name }}</span>
                @empty
                    <em>No tiene grupo</em>
                @endforelse
                </p>
            </div>
        </div>

        <h2 class="color-white">Post</h2>
        <div class="row">
            @foreach ($posts as $post)
            <div class="col-6">
                <div class="card mb-3">
                    <div class="row">
                        <div class="col-4">
                            <img src="{{$post->image->url}}" alt="" class="card-img">
                        </div>
                        <div class="col-8">
                            <div class="card-body">

                                <h5 class="card-title">{{$post->name}}</h5>
                                <h6 class="card-subtitle">
                                    {{$post->category->name}} |
                                    {{$post->comments_count}} 
                                    {{Str::plural('comentario'), $post->comments_count}} 
                                </h6>
                                <p class="card-text">
                                    @foreach ($post->tags as $tag)
                                    <span>#{{$tag->name}}</span>
                                    @endforeach
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <h2>Videos</h2>
        <div class="row">
            @foreach ($videos as $video)
            <div class="col-6">
                <div class="card mb-3">
                    <div class="row">
                        <div class="col-4">
                            <img src="{{$video->image->url}}" alt="" class="card-img">
                        </div>
                        <div class="col-8">
                            <div class="card-body">
                                <h5 class="card-title">{{$video->name}}</h5>
                                <h6 class="card-subtitle">
                                    {{$video->category->name}} |
                                    {{$video->comments_count}} 
                                    {{Str::plural('comentario'), $video->comments_count}} 
                                </h6>
                                <p class="card-text">
                                    @foreach ($video->tags as $tag)
                                    <span>#{{$tag->name}}</span>
                                    @endforeach
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>

</html>
