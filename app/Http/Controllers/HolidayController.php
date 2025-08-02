<?php

namespace App\Http\Controllers;

use App\Models\Holiday;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class HolidayController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:create holiday', only: ['create']),
            new Middleware('permission:delete holiday', only: ['delete']),
        ];
    }
    public function index()
    {
        $holidays = Holiday::orderBy('date')->get();
        return view('holidays.index', compact('holidays'));
    }

    public function create()
    {
        return view('holidays.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'date' => 'required|date',
            'type' => 'required|in:national,company,event,festival',
            'description' => 'nullable|string',
        ]);
        Holiday::create($request->all());
        return redirect()->route('holidays.index')->with('success', 'Holiday added sucessfully.');
    }
    public function destroy($id)
    {
        Holiday::destroy($id);
        return redirect()->back()->with('success', 'Holiday deleted sucessfully.');
    }
}

