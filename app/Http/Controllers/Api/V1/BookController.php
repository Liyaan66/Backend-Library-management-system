<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Book::with('category')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
        public function store(CreateBookRequest $request)
    {
        $validated = $request->validated();
        $book = Book::create($validated);

        return response()->json([
            'message' => 'Book created successfully',
            'data' => $book
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::with('category')->findOrFail($id);
        return response()->json($book);
    }

    /**
     * Update the specified resource in storage.
     */
     public function update(UpdateBookRequest $request, string $id)
    {
        $book = Book::findOrFail($id);
        $validated = $request->validated();
        $book->update($validated);

        return response()->json([
            'message' => 'Book updated successfully',
            'data' => $book
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return response()->json([
            'message' => 'Book deleted successfully'
        ]);
    }
}
