<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with('user')->get();
        // dd($books);

        return view('book', compact(["books"]));
    }

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
        $request->validate([
            'name' => 'required|string|max:255',
            'author' => 'required|string|max:255',
        ]);

        Book::create($request->all());

        // Save the book data to the database (you need to set up a database migration for the 'books' table)
        // For simplicity, we'll just dump the data for now
        // dump($request->all());

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $book )
    {
        $book = Book::findOrFail($book);

        return view('edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
    // Validation
    $request->validate([
        'name' => 'required|string|max:255',
        'author' => 'required|string|max:255',
    ]);

    // Update the book data in the database (you need to set up a 'books' table and a corresponding model)
    $book = Book::findOrFail($id);
    $book->update([
        'name' => $request->input('name'),
        'author' => $request->input('author'),
        // Add other fields as needed
    ]);

    return redirect()->route('book.index')->with('success', 'Book updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        // Delete the book
        $book->delete();
    
        return redirect()->route('book.index')->with('success', 'Book deleted successfully!');
    }
}
