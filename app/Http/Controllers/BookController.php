<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;

class BookController extends Controller
{
    /**
     * Instantiate a new BookController instance.
     */
    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:create-book|edit-book|delete-bookt', ['only' => ['index','show']]);
       $this->middleware('permission:create-book', ['only' => ['create','store']]);
       $this->middleware('permission:edit-book', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-book', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('books.index', [
            'books' => Book::latest()->paginate(3)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('books.create', [
            'categories' => Category::latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request): RedirectResponse
    {
        Book::create($request->all());
        return redirect()->route('books.index')
                ->withSuccess('New book is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book): View
    {
        return view('books.show', [
            'book' => $book
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book): View
    {
        return view('books.edit', [
            'book' => $book,
            'categories' => Category::latest()->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book): RedirectResponse
    {
        $book->update($request->all());
        return redirect()->back()
                ->withSuccess('Book is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book): RedirectResponse
    {
        $book->delete();
        return redirect()->route('books.index')
                ->withSuccess('Book is deleted successfully.');
    }
}