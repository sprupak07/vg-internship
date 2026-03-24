<aside id="sidebar" class="w-64 bg-gray-900 text-white flex flex-col transition-all duration-300">

    <div class="p-4 border-b border-gray-700 flex justify-between items-center">
        <h2 class="text-lg font-semibold">Admin Panel</h2>
    </div>

    <nav class="flex-1 p-4 space-y-2">
        <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-700">Dashboard</a>
        <a href="{{ route('categories.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700">Category</a>
        <a href="{{ route('authors.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700">Author</a>
        <a href="{{ route('books.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700">Book</a>
    </nav>

    <div class="p-4 border-t border-gray-700">
         <form method="POST" action="{{ route('logout') }}">
            @csrf
            <input type="submit" value="Logout">
         </form>
    </div>

</aside>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const toggleBtn = document.getElementById("toggleBtn");
        const sidebar = document.getElementById("sidebar");
        const headerToggleBtn = document.getElementById("headerToggleBtn");

        // Toggle sidebar visibility from inside
        if (toggleBtn) {
            toggleBtn.addEventListener("click", () => {
                sidebar.classList.toggle("hidden");
            });
        }

        // Toggle sidebar visibility from top navbar
        if (headerToggleBtn) {
            headerToggleBtn.addEventListener("click", () => {
                sidebar.classList.toggle("hidden");
            });
        }
    });
</script>
