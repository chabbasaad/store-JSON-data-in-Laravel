<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use Illuminate\Http\Request;

class MealController extends Controller
{
    public function index()
    {
        $meals = Meal::all();

        return view('meal.index', compact('meals'));
    }

    public function create()
    {
        return view('meal.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string',
            'status' => 'nullable|string',
        ]);

        $meal = new Meal();
        $meal->name = $request->input('name');
        $meal->status = $request->input('status');
        $meal->save();

        return redirect()->route('meal.index')->with('success', 'Meal created successfully.');
    }

    public function show(Meal $meal)
    {
        return view('meal.show', compact('meal'));
    }

    public function edit(Meal $meal)
    {
        return view('meal.edit', compact('meal'));
    }

    public function update(Request $request, Meal $meal)
    {
        $request->validate([
            'name' => 'nullable|string',
            'status' => 'nullable|string',
        ]);

        $meal->name = $request->input('name');
        $meal->status = $request->input('status');
        $meal->save();

        return redirect()->route('meal.index')->with('success', 'Meal updated successfully.');
    }

    public function destroy(Meal $meal)
    {
        $meal->delete();

        return redirect()->route('meal.index')->with('success', 'Meal deleted successfully.');
    }
}
