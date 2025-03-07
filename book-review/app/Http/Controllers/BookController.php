<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        /**
         * Retrieves and filters books based on search criteria and ratings.
         *
         * @param Request $request Contains the following query parameters:
         *                         - title: String to filter books by title
         *                         - filter: String to sort/filter books by popularity or rating
         *                                  Possible values: 'popular_last_month', 'popular_last_6months',
         *                                                 'highest_rated_last_month', 'highest_rated_last_6months'
         *
         * @return \Illuminate\View\View Returns view 'books.index' with paginated books data
         *                              Books are filtered by title if provided and sorted based on filter parameter
         *                              Default sorting is by latest with average rating and review count
         *
         * @uses Book::title() Scope to filter books by title
         * @uses Book::popularLastMonth() Scope to get popular books from last month
         * @uses Book::popularLast6Months() Scope to get popular books from last 6 months
         * @uses Book::highestRatedLastMonth() Scope to get highest rated books from last month
         * @uses Book::highestRatedLast6Months() Scope to get highest rated books from last 6 months
         * @uses Book::withAvgRating() Scope to include average rating
         * @uses Book::withReviewsCount() Scope to include review count
         *
         * Note: Cache implementation is currently commented out
         */
        $title = $request->input('title');
        $filter = $request->input('filter', '');

        $books = Book::when(
            $title,
            fn($query, $title) => $query->title($title)
        );

        $books = match ($filter) {
            'popular_last_month' => $books->popularLastMonth(),
            'popular_last_6months' => $books->popularLast6Months(),
            'highest_rated_last_month' => $books->highestRatedLastMonth(),
            'highest_rated_last_6months' => $books->highestRatedLast6Months(),
            default => $books->latest()->withAvgRating()->withReviewsCount()
        };

        $cacheKey = 'books:' . $filter . ':' . $title;
        $books =
            // cache()->remember(
            // $cacheKey,
            // 3600,
            // fn() =>
            $books->paginate(10)->withQueryString();  // Changed from get() to paginate(10)
        // );

        return view('books.index', ['books' => $books]);
    }

    // pagination withQueryString() method is used to append the current query string to the pagination links. This method is useful when you want to preserve the current query string parameters across pagination links. it has also cache() method to cache the query result for a specific time.

    // public function index(Request $request)
    // {
    //     $title = $request->input('title');
    //     $filter = $request->input('filter', '');

    //     $books = Book::when(
    //         $title,
    //         fn($query, $title) => $query->title($title)
    //     );

    //     $books = match ($filter) {
    //         'popular_last_month' => $books->popularLastMonth(),
    //         'popular_last_6months' => $books->popularLast6Months(),
    //         'highest_rated_last_month' => $books->highestRatedLastMonth(),
    //         'highest_rated_last_6months' => $books->highestRatedLast6Months(),
    //         default => $books->latest()->withAvgRating()->withReviewsCount()
    //     };

    //     $cacheKey = 'books:' . $filter . ':' . $title;
    //     $books = cache()->remember(
    //         $cacheKey,
    //         3600,
    //         fn() => $books->paginate(10)->withQueryString()
    //     );

    //     return view('books.index', ['books' => $books]);
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $cacheKey = 'book:' . $id;

        $book = cache()->remember(
            $cacheKey,
            3600,
            fn() =>
            Book::with([
                'reviews' => fn($query) => $query->latest()
            ])->withAvgRating()->withReviewsCount()->findOrFail($id)
        );

        return view('books.show', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
