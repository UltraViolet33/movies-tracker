<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Seen Movies') }}
        </h2>
    </x-slot>
    <div style="display:flex; flex-direction:column ;justify-content:space-between;align-items:center;gap:15px;">
        @foreach ($movies as $movie)
            <div style="border:2px solid black;padding:10px">
                <p>title : {{ $movie->title }} </p>
                <p>Year : {{ $movie->year }} </p>
                <p>Genre : {{ $movie->genre }} </p>
                <form method="POST" action="{{ route('delete.movie.seen') }}">
                    @csrf
                    @method('post')
                    <input type="hidden" name="idMovie" value="{{$movie->id}}">
                    <x-primary-button
                        onclick="event.preventDefault(); if(confirm('are you sure')){this.closest('form').submit()};">
                        {{ __('Remove from list') }}</x-primary-button>
                </form>
                <form method="POST" action="{{ route('add.movie.wish') }}">
                    @csrf
                    @method('post')
                    <input type="hidden" name="idMovie" value="{{$movie->id}}">
                    <x-primary-button
                        onclick="event.preventDefault(); if(confirm('are you sure')){this.closest('form').submit()};">
                        {{ __('Move to wish list') }}</x-primary-button>
                </form>
            </div>
        @endforeach
    </div>
</x-app-layout>
