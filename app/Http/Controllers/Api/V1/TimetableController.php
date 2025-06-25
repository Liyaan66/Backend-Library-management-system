<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTimetableRequest;
use App\Http\Requests\UpdateTimetableRequest;
use App\Models\Timetable;

class TimetableController extends Controller
{
    public function index()
    {
        return response()->json(Timetable::all(), 200);
    }

    public function store(CreateTimetableRequest $request)
    {
        $timetable = Timetable::create($request->validated());

        return response()->json([
            'message' => 'Timetable created successfully',
            'data' => $timetable
        ], 201);
    }

    public function show(string $id)
    {
        $timetable = Timetable::findOrFail($id);

        return response()->json($timetable, 200);
    }

    public function update(UpdateTimetableRequest $request, string $id)
    {
        $timetable = Timetable::findOrFail($id);

        $timetable->update($request->validated());

        return response()->json([
            'message' => 'Timetable updated successfully',
            'data' => $timetable
        ], 200);
    }

    public function destroy(string $id)
    {
        $timetable = Timetable::findOrFail($id);
        $timetable->delete();

        return response()->json(['message' => 'Timetable deleted successfully'], 200);
    }
}
