@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Sections for {{ $name }}</h1>
    <div class="bg-white p-6 rounded shadow">
        <p>This is the course sections page for <strong>{{ $name }}</strong>.</p>
        <p>Add your course sections and lectures here.</p>
    </div>
@endsection 