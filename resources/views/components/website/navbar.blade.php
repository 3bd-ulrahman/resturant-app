<div class="bg-white shadow-md" x-data="{ isOpen: false }">
  <nav class="container px-6 py-8 mx-auto md:flex md:justify-between md:items-center">
    <div class="flex items-center justify-between">
      <a class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 md:text-2xl hover:text-green-400"
        href="/">
        TailFood
      </a>
      <!-- Mobile menu button -->
      <div @click="isOpen = !isOpen" class="flex md:hidden">
        <button type="button" class="text-gray-800 hover:text-gray-400 focus:outline-none focus:text-gray-400"
          aria-label="toggle menu">
          <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
            <path fill-rule="evenodd"
              d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
            </path>
          </svg>
        </button>
      </div>
    </div>

    <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
    <div :class="isOpen ? 'flex' : 'hidden'"
      class="flex-col mt-8 space-y-4 md:flex md:space-y-0 md:flex-row md:items-center md:space-x-10 md:mt-0">
      <a href="/"
        class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400">
        Home
      </a>
      <a href="{{ route('categories.index') }}"
        class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400">
        Categories
      </a>
      <a href="{{ route('menus.index') }}"
        class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400">
        Our Menu
      </a>
      <a href="{{ route('reservations.index') }}"
        class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400">
        Make Reservation
      </a>
    </div>
  </nav>
</div>
