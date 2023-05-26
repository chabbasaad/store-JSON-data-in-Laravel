@extends('layouts.app')

@section('content')
    <h1>
        Goals</h1>

    <a href="{{ route('goal.create') }}" class="btn btn-primary mb-3">Create New Goal</a>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>User</th>
                <th>Meals</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($goals as $goal)
                <tr>
                    <td>{{ $goal->namegoals }}</td>
                    <td>{{ $goal->description }}</td>
                    <td>
                        @if ($goal->user_id && ($user = $users->where('id', $goal->user_id)->first()))
                            {{ $user->name }}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        @if ($goal->mealsids)
                            <ul>
                                @foreach ($goal->mealsids as $mealId)
                                    @if ($meal = $meals->where('id', $mealId)->first())
                                        <span class="badge bg-success">
                                            <li>{{ $meal->name }}</li>
                                        </span>
                                    @endif
                                @endforeach
                            </ul>
                        @else
                            -
                        @endif
                    </td>
                    <td>

                        <a href="{{ route('goal.edit', $goal->id) }}" class="btn btn-secondary">Edit</a>
                        <form action="{{ route('goal.destroy', $goal->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
