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
        // Correct relationships
        return BookKeeper::get();
    }

    public function store(CreateBookKeeperRequest $request)
    {
        $request->validated();

        BookKeeper::create([
            'name' => $request->name,
        ]);

        return response()->json(['message' => 'Book Keeper has been created!']);
    }

    public function show(string $id)
    {
        return BookKeeper::findOrFail($id);
    }

    public function update(UpdateBookKeeperRequest $request, string $id)
    {
        $bookKeeper = BookKeeper::findOrFail($id);

        $request->validate([
            
        ]);

        $bookKeeper->update([
            'name' => $request->name,
        ]);

        return response()->json(['message' => 'Book Keeper updated successfully']);
    }

    public function destroy(string $id)
    {
        $bookKeeper = BookKeeper::findOrFail($id);
        $bookKeeper->delete();

        return response()->json(['message' => 'Book Keeper deleted successfully']);
    }
}
