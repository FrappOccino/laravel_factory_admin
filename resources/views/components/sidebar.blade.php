<!-- Desktop Sidebar -->
<aside class="w-64 h-100x shadow-md hidden md:block rounded-lg border-2 border-solid">
    <div class="p-6 fixed">
        <h1 class="text-2xl font-bold mb-8">Factory Admin</h1>
        <nav class="space-y-2">
            <a href="{{ route('admin.index') }}" class="block px-4 py-2 rounded hover:bg-slate-950 hover:text-stone-50 transition">
                Dashboard
            </a>
            
            <a href="{{ route('admin.factories.index') }}" class="block px-4 py-2 rounded hover:bg-slate-950 hover:text-stone-50 transition">
                Factories
            </a>
            <a href="{{ route('admin.employees.index') }}" class="block px-4 py-2 rounded hover:bg-slate-950 hover:text-stone-50 transition">
                Employees
            </a>
            {{-- <a href="{{ route('admin.user.index') }}" class="block px-4 py-2 rounded hover:bg-gray-100 transition">
                User Activity
            </a> --}}
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="block px-4 py-2 text-rose-500 rounded hover:bg-slate-950 hover:text-stone-50 transition">
                    Logout
                </button>
            </form>
        </nav>
    </div>
</aside>

<!-- Mobile Toggle Button -->
<div class="md:hidden fixed top-4 right-4 z-50">
    <button id="mobile-menu-btn" class="p-2 bg-gray-200 rounded shadow-md">
        ☰
    </button>
</div>

<!-- Mobile Sidebar -->
<div id="mobile-sidebar"
    class="fixed inset-y-0 left-0 w-64 bg-white shadow-md transform -translate-x-full transition-transform duration-200 md:hidden z-50">
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-8">Factory Admin</h1>
        {{-- <nav class="space-y-2">
            <a href="{{ route('admin.index') }}" class="block px-4 py-2 rounded hover:bg-gray-100 transition">
                Dashboard
            </a>
            <a href="{{ route('admin.user.index') }}" class="block px-4 py-2 rounded hover:bg-gray-100 transition">
                Users
            </a>
            <a href="#" class="block px-4 py-2 rounded hover:bg-gray-100 transition">
                Settings
            </a>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2 rounded hover:bg-gray-100 transition">
                    Logout
                </button>
            </form>
        </nav> --}}
        <nav class="space-y-2">
            <a href="{{ route('admin.index') }}" class="block px-4 py-2 rounded hover:bg-gray-100 transition">
                Dashboard
            </a>
            <a href="{{ route('admin.factories.index') }}" class="block px-4 py-2 rounded hover:bg-gray-100 transition">
                Factories
            </a>
            <a href="{{ route('admin.employees.index') }}" class="block px-4 py-2 rounded hover:bg-gray-100 transition">
                Employees
            </a>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2 rounded hover:bg-gray-100 transition">
                    Logout
                </button>
            </form>
        </nav>
    </div>
</div>

<script>
    // Vanilla JS toggle for mobile sidebar
    const mobileBtn = document.getElementById('mobile-menu-btn');
    const mobileSidebar = document.getElementById('mobile-sidebar');

    mobileBtn.addEventListener('click', () => {
        mobileSidebar.classList.toggle('-translate-x-full');
    });

    // Optional: Close sidebar when clicking outside
    document.addEventListener('click', (e) => {
        if (!mobileSidebar.contains(e.target) && !mobileBtn.contains(e.target)) {
            mobileSidebar.classList.add('-translate-x-full');
        }
    });
</script>
