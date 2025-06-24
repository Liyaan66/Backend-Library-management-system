<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateReaderRequest;
use App\Http\Requests\UpdateReaderRequest;
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
    public function store(CreateReaderRequest $request)
{
    $reader = Reader::create($request->validated());

    return response()->json([
        'message' => 'Reader created successfully',
        'data' => $reader
    ], 201);
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
    public function update(UpdateReaderRequest $request, string $id)
    {
        $reader = Reader::FindOrFail($id);


        $validated = $request->validated();

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
