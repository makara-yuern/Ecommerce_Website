<x-app-layout>
  <x-slot name="header">
    <h2 class="flex text-gray-800 leading-tight space-x-2">
      <svg class="w-5 h-5 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
      </svg>
      <span>/</span>
      <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
      @vite(['resources/css/app.css', 'resources/css/admin.css', 'resources/js/app.js'])
      <script src="https://cdn.tailwindcss.com"></script>
      <span>{{ __('Product Management') }}</span>
    </h2>
  </x-slot>
  <section class="p-6 bg-white rounded-md shadow-md">
    <div class="mb-4 flex justify-between items-center">
      <form id="search-form" action="{{ route('product-management') }}" method="GET" class="flex space-x-2">
        <div class="flex-grow">
          <label for="product-search" class="block text-sm font-medium text-gray-700">Search a Product</label>
          <input type="text" id="product-search" name="search" value="{{ session('last_search_input') }}" placeholder="Search products" class="mt-1 px-4 py-2 block rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>
        <button type="submit" class="self-end px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
          Search
        </button>
      </form>
      <button id="create-new-product" class="openCreateProductModal mt-4 px-4 py-2 text-white bg-green-600 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
        Create a Product
      </button>
    </div>
    <table class="min-w-full divide-y divide-gray-200">
      <thead class="bg-gray-50">
        <tr>
          <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
          <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Product Name</th>
          <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
          <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
          <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">price</th>
          <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</th>
          <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Created At</th>
          <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($products as $product)
        <tr>
          <td class="px-6 py-4 whitespace-nowrap text-center">{{ $product->id }}</td>
          <td class="px-6 py-4 whitespace-nowrap flex items-center">
            <img src="{{ asset('storage/' . $product->image) }}" alt="Avatar" class="w-10 h-10 rounded-full mr-4">
            <span>{{ $product->name }}</span>
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-center">{{ $product->category->name ?? 'N/A' }}</td>
          <td class="px-6 py-4 whitespace-nowrap text-center">{{ $product->description }}</td>
          <td class="px-6 py-4 whitespace-nowrap text-center">{{ '$' . number_format($product->price, 2) }}</td>
          <td class="px-6 py-4 whitespace-nowrap text-center">{{ $product->stock }}</td>
          <td class="px-6 py-4 whitespace-nowrap text-center">{{ $product->created_at }}</td>
          <td class="px-6 py-4 whitespace-nowrap flex space-x-2">
            <button class="openEditProductModal text-blue-500 hover:underline" data-product-id="{{ $product->id }}">Edit</button>
            <form id="delete-product-{{ $product->id }}" action="{{ route('products.delete', ['product' => $product->id]) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="text-red-500 hover:underline">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

  </section>

  @include('admin.products.partials.create-product')
</x-app-layout>