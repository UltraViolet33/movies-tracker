<div style="border:2px solid black;padding:10px">
    <p>title : {{ $movie->title }} </p>
    <p>Year : {{ $movie->year }} </p>
    <p>Genre : {{ $movie->genre }} </p>

    <a href="/movies/details/{{$movie->title}}">See details</a>

</div>
