<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Reader;
use Illuminate\Http\Request;

class ReaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Reader::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'gender' => 'required|string'
        ]);

        Reader::create($data);

        return response()->json(['message' => 'Reader added successfully'], 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $reader = Reader::FindOrFail($id);
        return response()->json($reader);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $reader = Reader::FindOrFail($id);


        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:25',
            'email' => 'sometimes|required|string|email|max:25|unique:readers,email,' . $id,
            'gender' => 'sometimes|required|string',
        ]);

        $reader->update($validated);

        return response()->json([
            'message' => 'Reader updated successfully',
            'data' => $reader
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reader = Reader::findOrFail($id);
        $reader->delete();

        return response([
            'message' => 'Reader deleted seccessfully'
        ]);
    }
}
