<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Holiday;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    public function index()
    {
        return response()->json(Holiday::orderBy('date')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'date' => 'required|date',
            'type' => 'required|in:national,company,event',
            'description' => 'nullable|string',
        ]);

        $holiday = Holiday::create($validated);
        return response()->json(['message' => 'Holiday created', 'holiday' => $holiday], 201);
    }

    public function destroy($id)
    {
        Holiday::destroy($id);
        return response()->json(['message' => 'Holiday deleted']);
    }
}
