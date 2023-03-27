<x-admin.app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

      <div class="flex mb-2">
        <a href="{{ route('dashboard.menus.index') }}"
          class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">
          Menus
        </a>
      </div>

      <form action="{{ route('dashboard.tables.update', $table->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
        @csrf
        @method('PUT')

        <div class="mb-6">
          <label for="name" class="block font-medium text-sm text-gray-700 dark:text-gray-300">
            {{ __('Name') }}
          </label>
          <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full dark:focus:ring-0"
            name="name"
            value="{{ $table->name }}"
            id="name"
            type="text"
            required
            autofocus
          />
          <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mb-6">
          <label for="guest_number" class="block font-medium text-sm text-gray-700 dark:text-gray-300">
            {{ __('Guest Number') }}
          </label>
          <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full dark:focus:ring-0"
            name="guest_number"
            value="{{ $table->guest_number }}"
            id="guest_number"
            type="text"
            required
          />
          <x-input-error :messages="$errors->get('guest_number')" class="mt-2" />
        </div>

        <div class="mb-6">
          <label for="status" class="block font-medium text-sm text-gray-700 dark:text-gray-300">
            {{ __('Status') }}
          </label>
          <select
            name="status"
            id="location"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            autocomplete="off"
          >
            @foreach (App\Enums\TableStatus::cases() as $status)
              <option value="{{ $status->value }}" @selected($table->status->value == $status->value)>
                {{ $status->name }}
              </option>
            @endforeach
          </select>
          <x-input.error :messages="$errors->get('status')" class="mt-2" />
        </div>

        <div class="mb-6">
          <label for="location" class="block font-medium text-sm text-gray-700 dark:text-gray-300">
            {{ __('Location') }}
          </label>
          <select
            name="location"
            id="location"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            autocomplete="off"
          >
            @foreach (App\Enums\TableLocation::cases() as $location)
              <option value="{{ $location->value }}" @selected($table->location->value == $location->value)>
                {{ $location->name }}
              </option>
            @endforeach
          </select>
          <x-input.error :messages="$errors->get('location')" class="mt-2" />
        </div>

        <button type="submit"
          class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
      </form>

    </div>
  </div>

</x-admin.app-layout>
