<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBookKeeperRequest;
use App\Http\Requests\UpdateBookKeeperRequest;
use App\Models\BookKeeper;
use Illuminate\Http\Request;

class BookKeeperController extends Controller
{
    public function index()
    {
        return BookKeeper::get();
    }

    public function store(CreateBookKeeperRequest $request)
    {
        $validated = $request->validated();

        $bookKeeper = BookKeeper::create($validated);

        return response()->json(['message' => 'Book Keeper has been created!', 'data' =>  $bookKeeper], 201);
    }

    public function show(string $id)
    {
        return BookKeeper::findOrFail($id);
    }

    public function update(UpdateBookKeeperRequest $request, string $id)
    {
        $bookKeeper = BookKeeper::findOrFail($id);

        $validated = $request->validated();

        $bookKeeper->update($validated);

        return response()->json(['message' => 'Book Keeper updated successfully', 'data' => $bookKeeper]);
    }

    public function destroy(string $id)
    {
        $bookKeeper = BookKeeper::findOrFail($id);
        $bookKeeper->delete();

        return response()->json(['message' => 'Book Keeper deleted successfully']);
    }
}
