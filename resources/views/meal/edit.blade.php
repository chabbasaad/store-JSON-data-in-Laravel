@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1>Edit Meal</h1>

                <form action="{{ route('meal.update', $meal->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $meal->name }}">
                    </div>

                    <div class="form-group">
                        <label for="status">Status:</label>
                        <input type="text" class="form-control" name="status" id="status"
                            value="{{ $meal->status }}">
                    </div>

                    <!-- Add more fields as needed -->

                    <button type="submit" class="btn btn-primary">Update Meal</button>
                </form>
            </div>
        </div>
    </div>
@endsection
