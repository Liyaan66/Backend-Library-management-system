<?php
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\BookKeeper;
use Illuminate\Http\Request;
class BookKeeperController extends Controller
{
    public function index()
    {
        return BookKeeper::get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:25',
        ]);

        BookKeeper::create([
            'name' => $request->name,
        ]);

        return response()->json(['message' => 'Book Keeper has been created!']);
    }

    public function show(string $id)
    {
        return BookKeeper::with(['books', 'timetables'])->findOrFail($id);
    }

    public function update(Request $request, string $id)
    {
        $bookKeeper = BookKeeper::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:25',
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
