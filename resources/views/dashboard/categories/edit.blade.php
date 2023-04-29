<x-admin.app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

      <div class="flex mb-2">
        <a href="{{ route('dashboard.categories.index') }}"
          class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">
          Categories
        </a>
      </div>

      <form action="{{ route('dashboard.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-6">
          <x-input.label for="name" :value="__('name')" />
          <x-text-input id="name" class="block mt-1 w-full focus:ring-0" type="text" name="name" :value="$category->name" required autofocus autocomplete="username" />
          <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mb-6">
          <x-input.label for="email" :value="__('description')" />
          <textarea rows="4" name="description"
            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 focus:ring-0"
            placeholder="Your message..."
          >{{ $category->description }}</textarea>
          <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <div class="mb-6">
          <x-input.label for="image" :value="__('image')" />
          <x-text-input id="image" class="block w-full mt-1 border border-gray-200 shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 file:bg-transparent file:border-0 file:bg-gray-100 file:mr-4 file:py-3 file:px-4 dark:file:bg-gray-700 dark:file:text-gray-400"
            type="file"
            name="image"
            autofocus
            autocomplete="username"
          />
          <x-input-error :messages="$errors->get('description')" class="mt-2" />
          <div class="flex justify-center mt-1">
            <img src="{{ $category->image_url }}" id="image-preview" class="rounded">
          </div>
        </div>

        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>

    </div>
  </div>

  <x-slot:scripts>
    <script>
      var image = document.getElementById('image');
      image.addEventListener("change", function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
              var imagePreview = document.querySelector('#image-preview');
              imagePreview.setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
          }
      });
    </script>
  </x-slot:scripts>
</x-admin.app-layout>
