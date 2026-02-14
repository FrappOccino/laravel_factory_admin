@extends('layouts.base')

@section('content')
    <section class="px-4 py-6 sm:px-6 lg:px-8 max-w-7xl mx-auto flex flex-row gap-6">
        @include('components.sidebar')

        <div class="flex-1">
            @yield('page-content')
        </div>
    </section>
@endsection
