<div style="border:2px solid black;padding:10px">
    <p>title : {{ $movie->title }} </p>
    <p>Year : {{ $movie->year }} </p>
    <p>Genre : {{ $movie->genre }} </p>
    <x-primary-button class="mt-4">
        {{ __('See Details') }}</x-primary-button>
</div>
