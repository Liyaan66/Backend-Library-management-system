<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Timetable;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Exception;

class TimetableController extends Controller
{
    public function index()
    {
        try {
            $timetables = Timetable::all();
            return response()->json($timetables, 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to fetch timetables'], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'bookkeeper_id' => 'required|exists:book_keepers,id',
                'date' => 'required|date',
                'open_hour' => 'required|date_format:H:i',
                'close_hour' => 'required|date_format:H:i|after:open_hour',
            ]);

            $timetable = Timetable::create($validated);

            return response()->json([
                'message' => 'Timetable created successfully',
                'data' => $timetable
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'errors' => $e->errors()
            ], 422);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Something went wrong while creating the timetable.'
            ], 500);
        }
    }

    public function show(string $id)
    {
        try {
            $timetable = Timetable::findOrFail($id);
            return response()->json($timetable, 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Timetable not found'], 404);
        } catch (Exception $e) {
            return response()->json(['error' => 'Error retrieving timetable'], 500);
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $timetable = Timetable::findOrFail($id);

            $validated = $request->validate([
                'bookkeeper_id' => 'required|exists:book_keepers,id',
                'date' => 'required|date',
                'open_hour' => 'required|date_format:H:i',
                'close_hour' => 'required|date_format:H:i|after:open_hour',
            ]);

            $timetable->update($validated);

            return response()->json([
                'message' => 'Timetable updated successfully',
                'data' => $timetable
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Timetable not found'], 404);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (Exception $e) {
            return response()->json(['error' => 'Update failed'], 500);
        }
    }

    public function destroy(string $id)
    {
        try {
            $timetable = Timetable::findOrFail($id);
            $timetable->delete();

            return response()->json(['message' => 'Timetable deleted successfully'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Timetable not found'], 404);
        } catch (Exception $e) {
            return response()->json(['error' => 'Deletion failed'], 500);
        }
    }
}
