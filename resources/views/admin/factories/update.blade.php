@extends('layouts.admin')

@section('page-content')
    <div class="w-100 bg-white p-6 rounded shadow">
        <div class="flex justify-between">
            <h2 class="text-2xl font-semibold mb-4">Edit Factory</h2>
            <x-go-back-button />
        </div>
        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.factories.post.update') }}" method="POST">
            @csrf

            <!-- Factory Name (Required) -->
            <div class="mb-4">
                <label for="factory_name" class="block font-medium mb-1">Factory Name <span
                        class="text-red-500">*</span></label>
                <input type="text" name="factory_name" id="factory_name" value="{{ $factory->factory_name }}" required
                    class="w-full border-gray-300 rounded p-2 @error('factory_name') border-red-500 @enderror">
                @error('factory_name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Location (Required) -->
            <div class="mb-4">
                <label for="location" class="block font-medium mb-1">Location <span class="text-red-500">*</span></label>
                <input type="text" name="location" id="location" value="{{ $factory->location }}" required
                    class="w-full border-gray-300 rounded p-2 @error('location') border-red-500 @enderror">
                @error('location')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block font-medium mb-1">Email</label>
                <input type="email" name="email" id="email" value="{{ $factory->email ?? '' }}"
                    class="w-full border-gray-300 rounded p-2 @error('email') border-red-500 @enderror">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Website -->
            <div class="mb-4">
                <label for="website" class="block font-medium mb-1">Website</label>
                <input type="url" name="website" id="website" value="{{ $factory->website ?? '' }}"
                    class="w-full border-gray-300 rounded p-2 @error('website') border-red-500 @enderror">
                @error('website')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- <label for="id" class="hidde"></label> --}}
            <input type="url" name="website" id="website" value="{{ $factory->id }}" hidden>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script type="module"></script>
@endpush
