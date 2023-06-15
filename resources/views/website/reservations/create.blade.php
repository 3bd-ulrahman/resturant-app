<x-website.app-layout>
  <div class="container w-full px-5 py-6 mx-auto">
    <div class="flex items-center min-h-screen bg-gray-50">
      <div class="flex-1 h-full max-w-4xl mx-auto bg-white rounded-lg shadow-xl">
        <div class="flex flex-col md:flex-row">

          <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">

              <h3 class="mb-4 text-xl font-bold text-blue-600">
                Make Reservation
              </h3>

              <form method="POST" action="{{ route('reservations.index') }}">
                @csrf

                <div class="sm:col-span-6">
                  <label for="first_name" class="block text-sm font-medium text-gray-700">
                    First Name
                  </label>
                  <div class="mt-1">
                    <input type="text" id="first_name" name="first_name" value="{{ old('first_name', $reservation->first_name ?? '') }}" required
                      class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                  </div>
                  @error('first_name')
                    <span error id="first_name" class="text-sm text-red-400">
                      {{ $message }}
                    </span>
                  @enderror
                </div>

                <div class="sm:col-span-6">
                  <label for="last_name" class="block text-sm font-medium text-gray-700">
                    Last Name
                  </label>
                  <div class="mt-1">
                    <input type="text" id="last_name" name="last_name" value="{{ old('last_name', $reservation->last_name ?? '') }}"
                      class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                  </div>
                  @error('last_name')
                    <span class="text-sm text-red-400">
                      {{ $message }}
                    </span>
                  @enderror
                </div>

                <div class="sm:col-span-6">
                  <label for="email" class="block text-sm font-medium text-gray-700"> Email </label>
                  <div class="mt-1">
                    <input type="email" id="email" name="email" value="{{ old('email', $reservation->email ?? '') }}"
                      class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                  </div>
                  @error('email')
                    <span class="text-sm text-red-400">
                      {{ $message }}
                    </span>
                  @enderror
                </div>

                <div class="sm:col-span-6">
                  <label for="tel_number" class="block text-sm font-medium text-gray-700">
                    Phone number
                  </label>
                  <div class="mt-1">
                    <input type="tel" id="phone" name="phone" value="{{ old('phone', $reservation->phone ?? '') }}"
                      class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                  </div>
                  @error('phone')
                    <span class="text-sm text-red-400">
                      {{ $message }}
                    </span>
                  @enderror
                </div>

                <div class="sm:col-span-6">
                  <label for="res_date" class="block text-sm font-medium text-gray-700"> Reservation
                    Date
                  </label>
                  <div class="mt-1">
                    <input
                      class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                      type="date" id="date" name="date" min="{{ now()->format('Y-m-d') }}"
                      max="{{ now()->addWeek()->format('Y-m-d') }}" value="{{ old('date', $reservation->date ?? '') }}" />
                  </div>
                  @error('date')
                    <span class="text-sm text-red-400">
                      {{ $message }}
                    </span>
                  @enderror
                </div>

                <div class="sm:col-span-6">
                  <label for="guest_number" class="block text-sm font-medium text-gray-700">
                    Guest Number
                  </label>
                  <div class="mt-1">
                    <input type="number" id="guest_number" name="guest_number"
                      value="{{ old('guest_number', $reservation->guest_number ?? '') }}"
                      class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                  </div>
                  @error('guest_number')
                    <span class="text-sm text-red-400">
                      {{ $message }}
                    </span>
                  @enderror
                </div>

                <div class="sm:col-span-6">
                  <label for="status" class="block text-sm font-medium text-gray-700">Table</label>
                  <div class="mt-1">
                    <select id="table_id" name="table_id"
                      class="form-multiselect block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                      @foreach ($tables as $table)
                        <option value="{{ $table->id }}" @selected($table->id == old('table_id'))>
                          {{ $table->name }}
                          ({{ $table->guest_number }} Guests)
                        </option>
                      @endforeach
                    </select>
                  </div>
                  @error('table_id')
                    <span class="text-sm text-red-400">
                      {{ $message }}
                    </span>
                  @enderror
                </div>

                <div class="mt-6 flex justify-start">
                  <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">
                    Submit
                  </button>
                </div>

              </form>

            </div>
          </div>

          <div class="h-32 md:h-auto md:w-1/2">
            <img class="object-cover w-full h-full"
              src="{{ asset('coffe.webp') }}"
              alt="img"
            />
          </div>

        </div>
      </div>
    </div>
  </div>
</x-website.app-layout>
