<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($movie->title) }}
        </h2>
    </x-slot>


    <p>Title : {{ $movie->title }}</p>
    <p>year : {{ $movie->year }}</p>
    <p>genre : {{ $movie->genre }}</p>
    <p>plot : {{ $movie->plot }}</p>
    <p>director : {{ $movie->director }}</p>


    @if ($isSeen)

        <p>Film vu</p>
        <form method="POST" action="{{ route('delete.movie.seen') }}">
            @csrf
            @method('post')
            <input type="hidden" name="idMovie" value="{{ $movie->id }}">
            <x-primary-button
                onclick="event.preventDefault(); if(confirm('are you sure')){this.closest('form').submit()};">
                {{ __('Actually I don t') }}</x-primary-button>
        </form>
    @else
        <form method="POST" action="{{ route('add.movie.seen') }}">
            @csrf
            @method('post')
            <input type="hidden" name="idMovie" value="{{ $movie->id }}">
            <x-primary-button
                onclick="event.preventDefault(); if(confirm('are you sure')){this.closest('form').submit()};">
                {{ __('I saw this movie') }}</x-primary-button>
        </form>
    @endif


    @if ($isInWishList)
        <div>
            <p>Film in my wish list</p>
            <form method="POST" action="{{ route('delete.movie.wish') }}">
                @csrf
                @method('post')
                <input type="hidden" name="idMovie" value="{{ $movie->id }}">
                <x-primary-button
                    onclick="event.preventDefault(); if(confirm('are you sure')){this.closest('form').submit()};">
                    {{ __('Remove it ') }}</x-primary-button>
            </form>
        </div>

    @else 
    <div>
        <p>Ce film n'est pas dans ma liste à regarder</p>
        <form method="POST" action="{{ route('add.movie.wish') }}">
            @csrf
            @method('post')
            <input type="hidden" name="idMovie" value="{{ $movie->id }}">
            <x-primary-button
                onclick="event.preventDefault(); if(confirm('are you sure')){this.closest('form').submit()};">
                {{ __('Add it') }}</x-primary-button>
        </form>
    </div>
    @endif




</x-app-layout>
