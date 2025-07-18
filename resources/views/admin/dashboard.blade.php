<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .bg-dark-brown {
      background-color: #353333;
    }
    .bg-brown-hover:hover {
      background-color: #4a4a4a;
    }
    .bg-brown {
      background-color: #5c4033;
    }
  </style>
</head>
<body class="bg-amber-100 font-sans">

  <div class="flex transition-all duration-300">
    <!-- Sidebar -->
    <aside id="sidebar" class="w-64 bg-dark-brown text-white min-h-screen p-6 space-y-6 transition-all duration-300">
      <!-- Logo -->
      <div class="text-center">
        <img src="{{ asset('images/logoperpus.png') }}" alt="Logo Perpus" class="h-20 mx-auto mb-4">
        <h2 class="text-xl font-bold">Admin</h2>
      </div>

      <!-- Nav -->
      <nav class="space-y-3">
        <a href="{{ url('/admin/dashboard') }}" class="block px-3 py-2 rounded bg-gray-700 bg-brown-hover">Dashboard</a>
        <a href="{{ route('pustakawan.index') }}" class="block px-3 py-2 rounded bg-brown-hover">Pustakawan</a>
        <a href="{{ route('kategori.index') }}" class="block px-3 py-2 rounded bg-brown-hover">Kategori Buku</a>
      </nav>
    </aside>

    <!-- Main -->
    <div id="main-content" class="flex-1 p-10 transition-all duration-300 relative">

      <!-- Sidebar Toggle Button -->
      <button onclick="toggleSidebar()" class="absolute top-4 left-4 bg-dark-brown text-white p-2 rounded-md shadow-md z-20">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
      </button>

      <!-- Admin Dropdown -->
      <div class="absolute top-4 right-6">
        <div class="relative inline-block text-left">
          <button onclick="toggleDropdown()" class="flex items-center px-4 py-2 bg-brown text-white font-semibold rounded-md hover:opacity-90 shadow">
            Admin
            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-40 bg-white border border-gray-200 rounded shadow-md z-10">
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</button>
            </form>
          </div>
        </div>
      </div>

      <!-- Page content -->
      <h1 class="text-3xl font-bold text-gray-800 mb-6 mt-12">Selamat Datang, Admin!</h1>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white p-6 rounded-lg shadow text-center">
          <h2 class="text-xl font-semibold text-gray-700 mb-2">Jumlah Pustakawan</h2>
          <p class="text-4xl font-bold text-black">{{ $jumlahPustakawan }}</p>
        </div>
        <div class="bg-brown p-6 rounded-lg shadow text-center text-white">
          <h2 class="text-xl font-semibold mb-2">Jumlah Kategori Buku</h2>
          <p class="text-4xl font-bold">{{ $jumlahKategori }}</p>
        </div>
      </div>

    </div>
  </div>

  <script>
    let sidebarVisible = true;
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      const main = document.getElementById('main-content');
      if (sidebarVisible) {
        sidebar.classList.add('-ml-64');
        main.classList.add('ml-0');
      } else {
        sidebar.classList.remove('-ml-64');
        main.classList.remove('ml-0');
      }
      sidebarVisible = !sidebarVisible;
    }

    function toggleDropdown() {
      document.getElementById('dropdownMenu').classList.toggle('hidden');
    }

    window.addEventListener('click', function (e) {
      const button = document.querySelector('button[onclick="toggleDropdown()"]');
      const dropdown = document.getElementById('dropdownMenu');
      if (!button.contains(e.target) && !dropdown.contains(e.target)) {
        dropdown.classList.add('hidden');
      }
    });
  </script>

</body>
</html>
