<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Celebrity;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class CelebrityController extends Controller
{
    public function index()
    {
        $celebrities = Celebrity::all();
        return response()->json($celebrities);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'age' => 'required|integer|min:1|max:100',
            'job' => 'required|string|max:50',
            'alive' => 'required|boolean',
            'activeFrom' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);
        }

        $celebrity = Celebrity::create($validator->validated());

        return response()->json($celebrity, Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $celebrity = Celebrity::find($id);
        if (!$celebrity) {
            return response()->json(['message' => 'Celebrity not found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json($celebrity);
    }

    public function update(Request $request, $id)
    {
        $celebrity = Celebrity::find($id);
        if (!$celebrity) {
            return response()->json(['message' => 'Celebrity not found'], Response::HTTP_NOT_FOUND);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'string|max:50',
            'age' => 'integer|min:1|max:100',
            'name' => 'string|max:50',
            'alive' => 'boolean',
            'activeFrom' => 'date',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);
        }

        $celebrity->update($validator->validated());

        return response()->json($celebrity);
    }

    public function destroy($id)
    {
        $celebrity = Celebrity::find($id);
        if (!$celebrity) {
            return response()->json(['message' => 'Celebrity not found'], Response::HTTP_NOT_FOUND);
        }
        $celebrity->delete();

        return response()->json(['message' => 'Celebrity deleted'], Response::HTTP_OK);
    }
}
