<!-- Create Product Modal -->
<div id="createProductModal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 z-50 hidden">
    <div class="bg-white rounded-lg p-8 max-w-2xl w-full shadow-lg">
        <h1 class="text-2xl font-semibold mb-6">Create Product</h1>
        <form id="createProductForm" action="{{ route('products.store') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
            @csrf
            <div class="mt-4 p-4 border rounded-md">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Product name -->
                    <div>
                        <label for="create-product-name" class="block text-sm font-medium text-gray-700 mb-1">Product Name</label>
                        <input type="text" name="name" id="create-product-name" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Enter product name">
                        <div id="error-name" class="text-red-500 text-sm mt-1"></div>
                    </div>
                    <!-- Choose category -->
                    <div class="select-category">
                        <label for="productCategory" class="mb-1">Category Product</label>
                        <select id="productCategory" name="category_id" required class="form-select-category-product custom-select">
                            <option value="">Select Category Product</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <div id="error-category-product" class="text-red-500 text-sm mt-1"></div>
                    </div>
                </div>
                <!-- Description -->
                <div>
                    <label for="create-product-description" class="block mb-1">Description</label>
                    <textarea name="description" id="create-product-description" rows="4" required class="w-full px-3 py-2 border border-gray-300 rounded-md" placeholder="Enter product description"></textarea>
                    <div id="create-error-description" class="text-red-500 mt-1"></div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Product Price -->
                    <div class="select-size">
                        <label for="create-price" class="mb-1">Price ($)</label>
                        <input type="number" name="price" id="create-price" required step="0.01" min="0" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Enter product price">
                        <div id="error-price" class="text-red-500 text-sm mt-1"></div>
                    </div>
                    <!-- Product stock -->
                    <div>
                        <label for="create-stock" class="block text-sm font-medium text-gray-700 mb-1">Stock</label>
                        <input type="number" name="stock" id="create-stock" min="0" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Enter product stock">
                        <div id="error-stock" class="text-red-500 text-sm mt-1"></div>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Discount -->
                    <div>
                        <label for="discount" class="block text-sm font-medium text-gray-700 mb-1">Discount (%)</label>
                        <input type="number" name="discount" id="discount" step="0.01" min="0" max="100" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Enter discount percentage">
                        <div id="error-discount" class="text-red-500 text-sm mt-1"></div>
                    </div>
                    <!-- Select Size -->

                    <div class="select-size">
                        <label for="productSize" class="mb-1">Product Size</label>
                        <select id="ProductSize" name="size_id" class="form-select-product-size custom-select">
                            <option value="">Select Product Size</option>
                            @foreach($sizes as $size)
                            <option value="{{ $size->id }}">{{ $size->size }}</option>
                            @endforeach
                        </select>
                        <div id="error-product-size" class="text-red-500 text-sm mt-1"></div>
                    </div>
                </div>
                <!-- Choose Image -->
                <div>
                    <label for="avatar" class="block text-sm font-medium text-gray-700 mb-1">Avatar Image</label>
                    <input type="file" name="image" id="avatar" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <div id="error-avatar" class="text-red-500 text-sm mt-1"></div>
                </div>
                <!-- Choose Color -->
                <div>
                    <label for="color" class="block text-sm font-medium text-gray-700 mb-1">Color</label>
                    <input type="color" name="color" id="color" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <div id="error-color" class="text-red-500 text-sm mt-1"></div>
                </div>
            </div>
            <!-- Create Product Variant Form Template -->
            <div id="product-variant-template" class="hidden">
                <div class="variant-form mt-4 p-4 border rounded-md">
                    <h3 class="text-lg font-medium mb-2">Product Variant</h3>
                    <div>
                        <label for="variant-name" class="block text-sm font-medium text-gray-700 mb-1">Variant Name</label>
                        <input type="text" name="variants[][variant_name]" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Enter variant name">
                    </div>
                    <div class="select-variant-size">
                        <label for="productVariantSize" class="mb-1">Product Variant Size</label>
                        <select id="ProductVariantSize" name="variants[][size_id]" class="form-select-product-variant-size custom-select">
                            <option value="">Select Product Variant Size</option>
                            @foreach($sizes as $size)
                            <option value="{{ $size->id }}">{{ $size->size }}</option>
                            @endforeach
                        </select>
                        <div id="error-product-size" class="text-red-500 text-sm mt-1"></div>
                    </div>
                    <div>
                        <label for="variant-color" class="block text-sm font-medium text-gray-700 mb-1">Color</label>
                        <input type="color" name="variants[][variant_color]" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="variant-price" class="block text-sm font-medium text-gray-700 mb-1">Price ($)</label>
                        <input type="number" name="variants[][price]" step="0.01" min="0" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="variant-stock" class="block text-sm font-medium text-gray-700 mb-1">Stock</label>
                        <input type="number" name="variants[][stock]" min="0" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="variant-image" class="block text-sm font-medium text-gray-700 mb-1">Image</label>
                        <input type="file" name="variants[][image]" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                    <button type="button" class="remove-variant mt-2 text-red-500">Remove</button>
                </div>
            </div>

            <!-- Container for product variants -->
            <div id="variant-container"></div>

            <button id="create-product-variant" class="rounded-md transition-colors duration-200 bg-blue-500 text-white px-4 py-2 hover:bg-blue-600">
                Add Variant
            </button>

            <div class="flex items-center mt-4 space-x-4">
                <button type="submit" id="create-product" class="rounded-md transition-colors duration-200 bg-blue-500 text-white px-4 py-2 hover:bg-blue-600">
                    Create
                </button>
                <a href="#" id="closeCreateModal" class="text-center rounded-md bg-gray-200 px-4 py-2 hover:bg-gray-300">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.form-select-category-product').select2({
            placeholder: 'Select a category',
            width: 'resolve',
        });

        $('.form-select-product-size').select2({
            placeholder: 'Select a size',
            width: 'resolve',
        });

        $('.form-select-product-variant-size').select2({
            placeholder: 'Select a variant size',
            width: 'resolve',
        });

        // Open and close modal
        const createModal = document.getElementById('createProductModal');
        const openCreateModalButton = document.querySelector('.openCreateProductModal');
        const closeCreateModalButton = document.getElementById('closeCreateModal');
        const createForm = document.getElementById('createProductForm');
        const errorName = document.getElementById('error-name');
        const errorDescription = document.getElementById('create-error-description');
        const errorPrice = document.getElementById('error-price');
        const errorStock = document.getElementById('error-stock');
        const errorAvatar = document.getElementById('error-avatar');
        const errorColor = document.getElementById('error-color');

        openCreateModalButton.addEventListener('click', (e) => {
            e.preventDefault();
            createModal.classList.remove('hidden');
        });

        closeCreateModalButton.addEventListener('click', (e) => {
            e.preventDefault();
            createModal.classList.add('hidden');
        });

        // Handle create product form submission
        createForm.addEventListener('submit', (e) => {
            e.preventDefault();
            fetch(createForm.action, {
                    method: 'POST',
                    body: new FormData(createForm),
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.errors) {
                        errorName.textContent = data.errors.name ? data.errors.name[0] : '';
                        errorDescription.textContent = data.errors.description ? data.errors.description[0] : '';
                        errorPrice.textContent = data.errors.price ? data.errors.price[0] : '';
                        errorStock.textContent = data.errors.stock ? data.errors.stock[0] : '';
                        errorAvatar.textContent = data.errors.image ? data.errors.image[0] : '';
                        errorColor.textContent = data.errors.color ? data.errors.color[0] : '';
                    } else {
                        window.location.href = "{{ route('product-management') }}";
                    }
                })
                .catch(error => {
                    console.error('Error creating product:', error);
                });
        });
    });

    document.addEventListener('DOMContentLoaded', function() {

        const variantContainer = document.getElementById('variant-container');
        const addVariantButton = document.getElementById('create-product-variant');
        const variantTemplate = document.getElementById('product-variant-template').innerHTML;
        let variantCount = 0;

        if (!variantContainer) {
            console.error('Variant container element not found');
            return;
        }

        addVariantButton.addEventListener('click', function() {
            variantCount++;
            const variantHtml = variantTemplate.replace(/\[\]/g, `[${variantCount}]`);
            variantContainer.insertAdjacentHTML('beforeend', variantHtml);

            $('.form-select-product-variant-size').select2({
                placeholder: 'Select a variant size',
                width: 'resolve',
            });

            // Attach remove event to newly added remove buttons
            const removeButtons = document.querySelectorAll('.remove-variant');
            removeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    this.closest('.variant-form').remove();
                });
            });
        });
    });
</script>