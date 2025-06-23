<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\BorrowBook;
use Illuminate\Http\Request;

class BorrowBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return BorrowBook::with(['book', 'reader'])->get(); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_id' => 'required|exists:books,id',
            'reader_id' => 'required|exists:readers,id',
            'borrowed_at' => 'required|date',
            'due_date' => 'required|date|after:borrowed_at',
        ]);

        $borrow = BorrowBook::create($validated);

        return response()->json([
            'message' => 'Borrow record created successfully',
            'data' => $borrow
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $borrow = BorrowBook::with(['book', 'reader'])->findOrFail($id);
        return response()->json($borrow);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $borrow = BorrowBook::findOrFail($id);

        $validated = $request->validate([
            'book_id' => 'sometimes|exists:books,id',
            'reader_id' => 'sometimes|exists:readers,id',
            'borrowed_at' => 'sometimes|date',
            'due_date' => 'sometimes|date|after:borrowed_at',
        ]);

        $borrow->update($validated);

        return response()->json([
            'message' => 'Borrow record updated successfully',
            'data' => $borrow
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $borrow = BorrowBook::findOrFail($id);
        $borrow->delete();

        return response()->json([
            'message' => 'Borrow record deleted successfully'
        ]);
    }
}
