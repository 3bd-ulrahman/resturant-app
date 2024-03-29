@if (session('success'))
  <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
    <span class="font-medium">{{ session()->get('success') }}</span>
  </div>
@endif



@if (session('warning'))
  <div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
    <span class="font-medium">{{ session()->get('warning') }}</span>
  </div>
@endif

@if (session('danger'))
  <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
    <span class="font-medium">{{ session()->get('danger') }}</span>
  </div>
@endif
