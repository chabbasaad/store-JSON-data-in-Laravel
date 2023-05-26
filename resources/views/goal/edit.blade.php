@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Goal</h1>

        <form action="{{ route('goal.update', $goal->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="namegoals" class="form-label">Name:</label>
                <input type="text" name="namegoals" id="namegoals" value="{{ $goal->namegoals }}" class="form-control"
                    required>
                @error('namegoals')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea name="description" id="description" class="form-control" required>{{ $goal->description }}</textarea>
                @error('description')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="mealsids" class="form-label">Meals:</label>
                <select name="mealsids[]" id="mealsids" class="form-control" multiple>
                    @foreach ($meals as $meal)
                        <option value="{{ $meal->id }}" @if (in_array($meal->id, $goal->mealsids)) selected @endif>
                            {{ $meal->name }}</option>
                    @endforeach
                </select>
                @error('mealsids')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="user_id" class="form-label">User:</label>
                <select name="user_id" id="user_id" class="form-control">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" @if ($user->id === $goal->user_id) selected @endif>
                            {{ $user->name }}</option>
                    @endforeach
                </select>
                @error('user_id')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Goal</button>
        </form>
    </div>
@endsection
