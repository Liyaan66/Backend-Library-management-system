<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBorrowBookRequest;
use App\Http\Requests\UpdateBorrowBookRequest;
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
    public function store(CreateBorrowBookRequest $request)
    {
        $validated = $request->validated();

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
        //
    }
    public function markAsReturned($id)
    {
        $borrowing = BorrowBook::findOrFail($id);

        $borrowing->returned_at = now(); // or you can take date from request
        $borrowing->save();

        return response()->json([
            'message' => 'Book returned successfully',
            'data' => $borrowing
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBorrowBookRequest $request, string $id)
    {
        $borrow = BorrowBook::findOrFail($id);

        $validated = $request->validated();

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
