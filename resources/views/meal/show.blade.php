@extends('layouts.app')

@section('content')
    <h2>{{ $meal->name }}</h2>
    <p>Status: {{ $meal->status }}</p>
@endsection
