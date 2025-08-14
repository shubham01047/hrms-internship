<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Holiday;
use Illuminate\Http\Request;

class HolidayApiController extends Controller
{
    public function index()
    {
        $holidays = Holiday::orderBy('date')->get();

        return response()->json([
            'success' => true,
            'holidays' => $holidays
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'date' => 'required|date',
            'type' => 'required|in:national,company,event,festival',
            'description' => 'nullable|string',
        ]);

        $holiday = Holiday::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Holiday added successfully.',
            'holiday' => $holiday
        ], 201);
    }

    public function destroy($id)
    {
        $holiday = Holiday::find($id);

        if (!$holiday) {
            return response()->json([
                'success' => false,
                'message' => 'Holiday not found.'
            ], 404);
        }

        $holiday->delete();

        return response()->json([
            'success' => true,
            'message' => 'Holiday deleted successfully.'
        ]);
    }
}
