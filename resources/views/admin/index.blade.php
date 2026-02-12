@extends('layouts.base')

@section('title', 'admin')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-semibold mb-4">Dashboard</h2>
        <p>Welcome to Factory Admin dashboard.</p>
    </div>
    <form method="POST" action="{{route('admin.logout')}}">
        @csrf
        <input type="submit" value="Submit">
    </form>
@endsection
