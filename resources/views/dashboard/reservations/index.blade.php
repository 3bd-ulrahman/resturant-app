<x-dashboard.app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
          <th scope="col" class="px-6 py-3">
            Name
          </th>
          <th scope="col" class="px-6 py-3">
            Email
          </th>
          <th scope="col" class="px-6 py-3">
            Date
          </th>
          <th scope="col" class="px-6 py-3">
            Table
          </th>
          <th scope="col" class="px-6 py-3">
            Guests
          </th>
          <th scope="col" class="px-6 py-3">
            Actions
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($reservations as $reservation)
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
              {{ $reservation->user->name }}
            </th>
            <td class="px-6 py-4">
              {{ $reservation->user->email }}
            </td>
            <td class="px-6 py-4">
              {{ $reservation->date }}
            </td>
            <td class="px-6 py-4">
              {{ $reservation->table->name }}
            </td>
            <td class="px-6 py-4">
              {{ $reservation->guest_number }}
            </td>
            <td class="px-6 py-4">
              <form action="{{ route('dashboard.reservations.destroy', $reservation->id) }}" method="post"
                onsubmit="return confirm('Are you sure')" class="inline">
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

  <div class="pt-6">
    {{ $reservations->links('vendor/pagination/tailwind') }}
  </div>
</x-dashboard.app-layout>
