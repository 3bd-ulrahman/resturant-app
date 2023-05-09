<x-dashboard.app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="flex mb-2">
    <a href="{{ route('dashboard.reservations.index') }}"
      class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">
      Reservations
    </a>
  </div>

  <form action="{{ route('dashboard.reservations.store') }}" method="POST">
    @csrf

    <div class="mb-6">
      <label for="first_name" class="block font-medium text-sm text-gray-700 dark:text-gray-300">
        First Name
      </label>
      <input
        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full dark:focus:ring-0"
        name="first_name" value="{{ old('first_name') }}" type="text" required autofocus />
      @error('first_name')
        <span error id="first_name" class="text-sm text-red-600 dark:text-red-400 space-y-1">
          {{ $message }}
        </span>
      @enderror
    </div>

    <div class="mb-6">
      <label for="last_name" class="block font-medium text-sm text-gray-700 dark:text-gray-300">
        Last Name
      </label>
      <input
        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full dark:focus:ring-0"
        name="last_name" value="{{ old('last_name') }}" type="text" required autofocus />
      @error('last_name')
        <span error id="last_name" class="text-sm text-red-600 dark:text-red-400 space-y-1">
          {{ $message }}
        </span>
      @enderror
    </div>

    <div class="mb-6">
      <label for="email" class="block font-medium text-sm text-gray-700 dark:text-gray-300">
        Email
      </label>
      <input
        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full dark:focus:ring-0"
        name="email" value="{{ old('email') }}" type="text" autofocus />
      @error('email')
        <span error id="email" class="text-sm text-red-600 dark:text-red-400 space-y-1">
          {{ $message }}
        </span>
      @enderror
    </div>

    <div class="mb-6">
      <label for="phone" class="block font-medium text-sm text-gray-700 dark:text-gray-300">
        Phone
      </label>
      <input
        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full dark:focus:ring-0"
        name="phone" value="{{ old('phone') }}" type="number" required autofocus />
      @error('phone')
        <span error id="phone" class="text-sm text-red-600 dark:text-red-400 space-y-1">
          {{ $message }}
        </span>
      @enderror
    </div>

    <div class="mb-6">
      <label for="date" class="block font-medium text-sm text-gray-700 dark:text-gray-300">
        Reservation Date
      </label>
      <input
        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full dark:focus:ring-0"
        name="date"
        value="{{ old('date', now()->format('Y-m-d')) }}"
        min="{{ now()->format('Y-m-d') }}"
        max="{{ now()->addDays(7)->format('Y-m-d') }}"
        type="date"
        autocomplete="off"
      />
      @error('date')
        <span error id="date" class="text-sm text-red-600 dark:text-red-400 space-y-1">
          {{ $message }}
        </span>
      @enderror
    </div>

    <div class="mb-6">
      <label for="guest_number" class="block font-medium text-sm text-gray-700 dark:text-gray-300">
        Guest Number
      </label>
      <input
        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full dark:focus:ring-0"
        name="guest_number" value="{{ old('guest_number') }}" type="text" required autofocus
      />
      @error('guest_number')
        <span error id="guest_number" class="text-sm text-red-600 dark:text-red-400 space-y-1">
          {{ $message }}
        </span>
      @enderror
    </div>

    <div class="mb-6">
      <label for="status" class="block font-medium text-sm text-gray-700 dark:text-gray-300">
        Table
      </label>
      <select name="table_id"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        autocomplete="off">
        @foreach ($tables as $table)
          <option value="{{ $table->id }}"@selected(old('table_id') == $table->id)>
            {{ $table->name }} ({{ $table->guest_number }} Guests)
          </option>
        @endforeach
      </select>
      @error('table_id')
        <span error id="table_id" class="text-sm text-red-600 dark:text-red-400 space-y-1">
          {{ $message }}
        </span>
      @enderror
    </div>

    <button type="submit"
      class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
  </form>
</x-dashboard.app-layout>
