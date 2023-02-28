<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($movie->title) }}
        </h2>
    </x-slot>

    <div style="height: 80vh" class="flex justify-center items-center h-max">
        <div class="px-4 py-4">
            <div class="px-4 py-4">
                <p>Title : {{ $movie->title }}</p>
                <p>Year : {{ $movie->year }}</p>
                <p>Genre : {{ $movie->genre }}</p>
                <p>Plot : {{ $movie->plot }}</p>
                <p>Director : {{ $movie->director }}</p>

                @if ($movie->categories)
                    <h3>Genres : </h3>
                    <ul>
                        @foreach ($movie->categories as $category)
                            <li>{{ $category->name }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <div class="px-4 py-4">
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
                        <p>Film in my watch list</p>
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
            </div>
        </div>
    </div>
</x-app-layout>
