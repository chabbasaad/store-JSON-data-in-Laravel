<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use App\Models\Meal;
use App\Models\User;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $goals = Goal::all();
        $meals = Meal::all();
        $users = User::all();
        return view('goal.index', compact('goals', 'meals', 'users'));
    }

    public function create()
    {
        $goals = Goal::all();
        $meals = Meal::all();
        $users = User::all();
        return view('goal.create', compact('goals', 'meals', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'namegoals' => 'required|string',
            'description' => 'required|string',
            'mealsids' => 'nullable|array',
            'mealsids.*' => 'exists:meals,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $goal = new Goal();
        $goal->namegoals = $request->input('namegoals');
        $goal->description = $request->input('description');
        $goal->mealsids = $request->input('mealsids');
        $goal->user_id = $request->input('user_id');
        $goal->save();

        return redirect()->route('goal.index')->with('success', 'Goal created successfully.');
    }

    public function show(Goal $goal)
    {
        $goals = Goal::all();
        $meals = Meal::all();
        $users = User::all();
        return view('goal.create', compact('goals', 'meals', 'users'));
    }

    public function edit(Goal $goal)
    {
        // $goals = Goal::all();
        $meals = Meal::all();
        $users = User::all();
        return view('goal.edit', compact('goal', 'meals', 'users'));
    }

    public function update(Request $request, Goal $goal)
    {
        $request->validate([
            'namegoals' => 'required|string',
            'description' => 'required|string',
            'mealsids' => 'nullable|array',
            'mealsids.*' => 'exists:meals,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $goal->namegoals = $request->input('namegoals');
        $goal->description = $request->input('description');
        $goal->mealsids = $request->input('mealsids');
        $goal->user_id = $request->input('user_id');
        $goal->save();

        return redirect()->route('goal.index')->with('success', 'Goal updated successfully.');
    }

    public function destroy(Goal $goal)
    {
        $goal->delete();

        return redirect()->route('goal.index')->with('success', 'Goal deleted successfully.');
    }
}
