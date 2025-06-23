<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Timetable;
use Illuminate\Http\Request;

class TimetableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      return response()->json(Timetable::with('bookkeeper')->get(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'bookkeeper_id' => 'required|exists:book_keepers,id',
            'date' => 'required|date',
            'open_hour' => 'required|date_format:H:i',
            'close_hour' => 'required|date_format:H:i',
        ]);

        $timetable = Timetable::create($validated);

        return response()->json($timetable, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $timetable = Timetable::with('bookkeeper')->find($id);

        if (!$timetable) {
            return response()->json(['message' => 'Timetable not found'], 404);
        }

        return response()->json($timetable);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $timetable = Timetable::find($id);

        if (!$timetable) {
            return response()->json(['message' => 'Timetable not found'], 404);
        }

        $validated = $request->validate([
            'bookkeeper_id' => 'sometimes|exists:book_keepers,id',
            'date' => 'sometimes|date',
            'open_hour' => 'sometimes|date_format:H:i',
            'close_hour' => 'sometimes|date_format:H:i',
        ]);

        $timetable->update($validated);

        return response()->json($timetable);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $timetable = Timetable::find($id);

        if (!$timetable) {
            return response()->json(['message' => 'Timetable not found'], 404);
        }

        $timetable->delete();

        return response()->json(['message' => 'Timetable deleted']);
    }
}
