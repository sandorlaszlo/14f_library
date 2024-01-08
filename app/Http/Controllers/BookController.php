<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookStoreRequest;
use App\Http\Requests\BookUpdateRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $books = Book::all();
        $books = Book::with('category')->get();
        return response()->json($books);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookStoreRequest $request)
    {
        $request->validated($request->all());

        // $book = Book::create($request->all());
        $book = Book::create($request->only(['title', 'year', 'pages',  'ISBN', 'category_id']));
        return response()->json($book, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {


        // $book = Book::where('id','=',$id)->get();
        $book = Book::with('category')->find($id);
        if ($book == null)
            return response()->json(['message' => 'No book found.'], 404);
        return response()->json($book);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookUpdateRequest $request, $id)
    {
        $book = Book::findOrFail($id);
        $request->validated($request->all());

        $book->update($request->only(['title', 'year', 'pages',  'ISBN', 'category_id']));
        return response()->json($book, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return response('', 204);
    }
}
