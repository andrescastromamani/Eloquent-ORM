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
    <div class="container">
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
    </div>
</body>

</html>
