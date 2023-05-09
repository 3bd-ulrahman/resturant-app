<x-dashboard.app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="flex mb-2">
    <a href="{{ route('dashboard.menus.index') }}"
      class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">
      Menus
    </a>
  </div>

  <form action="{{ route('dashboard.menus.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
    @csrf

    <div class="mb-6">
      <x-input.label for="categories" :value="__('Categories')" />
      <select id="categories" name="categories_id[]"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        multiple>
        @foreach ($categories as $category)
          <option value="{{ $category->id }}">
            {{ $category->name }}
          </option>
        @endforeach
      </select>
      <x-input.error :messages="$errors->get('categories_id')" class="mt-2" />
    </div>

    <div class="mb-6">
      <x-input.label for="email" :value="__('Name')" />
      <x-text-input class="block mt-1 w-full focus:ring-0" type="text" name="name" :value="old('name')" required
        autofocus autocomplete="name" />
      <x-input.error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <div class="mb-6">
      <x-input.label for="email" :value="__('Description')" />
      <x-text-input class="block mt-1 w-full focus:ring-0" type="text" name="description" :value="old('description')" required
        autofocus autocomplete="description" />
      <x-input.error :messages="$errors->get('description')" class="mt-2" />
    </div>

    <div class="mb-6">
      <x-input.label for="email" :value="__('Price')" />
      <x-text-input class="block mt-1 w-full focus:ring-0" type="text" name="price" :value="old('price')" required
        autofocus autocomplete="price" />
      <x-input.error :messages="$errors->get('price')" class="mt-2" />
    </div>

    <div class="mb-6">
      <x-input.label for="image" :value="__('image')" />
      <x-text-input
        class="image block w-full mt-1 border border-gray-200 shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 file:bg-transparent file:border-0 file:bg-gray-100 file:mr-4 file:py-3 file:px-4 dark:file:bg-gray-700 dark:file:text-gray-400"
        type="file" name="image" required autofocus autocomplete="username" />
      <x-input.error :messages="$errors->get('image')" class="mt-2" />
      <div class="flex justify-center mt-1">
        <img src="" class="image-preview" class="rounded">
      </div>
    </div>

    <button type="submit"
      class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
  </form>

</x-dashboard.app-layout>
