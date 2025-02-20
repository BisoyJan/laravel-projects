@extends('layouts.app')

@section('content')
    <h1 class="mb-10 text-2xl">Books</h1>

    <form action=""></form>

    <ul class="space-y-4">
        @forelse ($books as $book)
            <li>
                <div class="book-item">
                    <div class="flex items-center justify-between">
                        <div class="flex flex-col w-full flex-grow sm:w-auto">
                            <a href="{{ route('books.show', $book)}}" class="book-title">
                                {{ $book->title }}
                            </a>
                            <span class="book-author">by {{ $book->author }}</span>
                        </div>
                        <div class="flex flex-col items-end">
                            <div class="book-rating">
                                {{ number_format($book->reviews_avg_rating, 1) }}
                            </div>
                            <div class="book-review-count">
                                out of {{ $book->reviews_count }} {{ Str::plural('review', $book->reviews_count) }}
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        @empty
            <li>
                <div class="empty-book-item">
                    <p class="empty-text">No books found</p>
                    <a href="{{ route('books.index')}}" class="reset-link">Reset criteria</a>
                </div>
            </li>
        @endforelse
    </ul>
@endsection
