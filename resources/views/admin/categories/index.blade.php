<x-admin.app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

      <div class="flex justify-end mb-2">
        <a href="{{ route('admin.categories.create') }}"
          class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">
          New Category
        </a>
      </div>

      <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="px-6 py-3">
                Name
              </th>
              <th scope="col" class="px-6 py-3">
                Description
              </th>
              <th scope="col" class="px-6 py-3">
                Image
              </th>
              <th scope="col" class="px-6 py-3">
                Edit
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($categories as $category)
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $category->name }}
                </td>
                <td class="px-6 py-4  font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $category->description }}
                </td>
                <td class="px-6 py-4">
                  <img src="{{ $category->image_url }}" class="w-16 h-16 rounded" alt="">
                </td>
                <td class="px-6 py-4">
                  <a href="{{ route('admin.categories.edit', $category->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                    Edit
                  </a>
                  &emsp;
                  <form action="{{ route('admin.categories.destroy', $category->id) }}" method="post"
                    onsubmit="return confirm('Are you sure')"
                    class="inline">
                    @csrf
                    @method('DELETE')

                    <button type="submit">
                      <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline hover:text-red-500">
                        Delete
                      </a>
                    </button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

    </div>
  </div>
</x-admin.app-layout>
