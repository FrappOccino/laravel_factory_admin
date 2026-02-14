<form method="POST" action="{{ route('admin.logout') }}">
    @csrf
    <button type="submit" class="w-full text-left px-4 py-2 rounded hover:bg-gray-100 transition">
        {{ $slot ?? 'Logout' }}
    </button>
</form>
