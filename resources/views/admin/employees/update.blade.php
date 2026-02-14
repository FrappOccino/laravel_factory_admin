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

            <!-- Employee First Name (Required) -->
            <div class="mb-4">
                <label for="firstname" class="block font-medium mb-1">First Name <span class="text-red-500">*</span></label>
                <input type="text" name="firstname" id="firstname" value="{{ $employees->firstname }}" required
                    class="w-full border-gray-300 rounded p-2 @error('firstname') border-red-500 @enderror">
                @error('firstname')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Employee Last Name (Required) -->
            <div class="mb-4">
                <label for="lastname" class="block font-medium mb-1">Last Name <span class="text-red-500">*</span></label>
                <input type="text" name="lastname" id="lastname" value="{{ $employees->lastname }}" required
                    class="w-full border-gray-300 rounded p-2 @error('location') border-red-500 @enderror">
                @error('location')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Factory ID -->
            <div class="mb-4">
                <label for="factory_id" class="block font-medium mb-1">Factory ID</label>
                <input type="number" name="factory_id" id="factory_id" value="{{ $employees->factory_id }}"
                    class="w-full border-gray-300 rounded p-2 @error('factory_id') border-red-500 @enderror">
                @error('factory_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block font-medium mb-1">Email</label>
                <input type="email" name="email" id="email" value="{{ $employees->email }}"
                    class="w-full border-gray-300 rounded p-2 @error('email') border-red-500 @enderror">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Phone -->
            <div class="mb-4">
                <label for="phone" class="block font-medium mb-1">Phone</label>
                <input type="tel" name="phone" id="phone" value="{{ $employees->phone }}"
                    class="w-full border-gray-300 rounded p-2 @error('phone') border-red-500 @enderror">
                @error('phone')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Update Employee
                </button>
            </div>

        </form>
    </div>
@endsection

@push('scripts')
    <script type="module"></script>
@endpush
