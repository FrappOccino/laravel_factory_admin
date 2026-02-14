@extends('layouts.base')

@section('title', 'Login')

@section('content')
    <form id="login" class="max-w-md mx-auto mt-10 p-6 bg-white rounded-lg shadow-md" method="POST" action="{{ route('auth.post.login') }}">
        @csrf
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-semibold mb-2">First name:</label>
            <input type="email" id="email" name="email" required
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div class="mb-6">
            <label for="password" class="block text-gray-700 font-semibold mb-2">Last name:</label>
            <input type="password" id="password" name="password" required
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <input type="submit" value="Submit"
                class="w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-600 transition-colors cursor-pointer">
        </div>
    </form>


    <script type="module">
        // console.log()
        // $('#login').on('submit', function(e) {
        //     e.preventDefault();
        //     alert('submit');
        // });
    </script>
@endsection
