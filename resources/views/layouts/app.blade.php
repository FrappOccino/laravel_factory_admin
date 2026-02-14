@extends('layouts.base')

@section('content')
    @include('components.navbar')

    <section class="px-4 py-6 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        @yield('page-content')
    </section>
@endsection
