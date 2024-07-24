<div class="container mx-auto p-6">
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="product-form border border-gray-300 rounded p-4 mb-4">
            <h1 class="text-2xl font-bold mb-6">Create Product</h1>
            <div class="form-group mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-1">Name</label>
                <input type="text" name="name" class="form-control border border-gray-300 rounded-lg p-2 w-full" id="name" required>
            </div>
            <div class="form-group mb-4">
                <label for="description" class="block text-gray-700 font-medium mb-1">Description</label>
                <textarea name="description" class="form-control border border-gray-300 rounded-lg p-2 w-full" id="description" required></textarea>
            </div>
            <div class="form-group mb-4">
                <label for="price" class="block text-gray-700 font-medium mb-1">Price</label>
                <input type="number" name="price" class="form-control border border-gray-300 rounded-lg p-2 w-full" id="price" step="0.01" required>
            </div>
            <div class="form-group mb-4">
                <label for="stock" class="block text-gray-700 font-medium mb-1">Stock</label>
                <input type="number" name="stock" class="form-control border border-gray-300 rounded-lg p-2 w-full" id="stock" required>
            </div>
            <div class="form-group mb-4">
                <label for="image" class="block text-gray-700 font-medium mb-1">Image</label>
                <input type="file" name="image" class="form-control border border-gray-300 rounded-lg p-2 w-full" id="image" accept="image/*" required>
            </div>
            <div class="form-group mb-4">
                <label for="color" class="block text-gray-700 font-medium mb-1">Color</label>
                <input type="text" name="color" class="form-control border border-gray-300 rounded-lg p-2 w-full" id="color">
            </div>
        </div>
        <div id="variantContainer" class="mt-4"></div>
        <div class="mb-4 mt-4">
            <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded" id="addVariantButton">Add Variant</button>
        </div>
        <div class="mt-4">
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Save Product</button>
        </div>
    </form>
</div>

<script>
    document.getElementById('addVariantButton').addEventListener('click', function() {
        const variantContainer = document.getElementById('variantContainer');
        const variantIndex = variantContainer.children.length;

        const variantForm = `
                <div class="variant-form border border-gray-300 rounded p-4 mb-4">
                    <h1 class="text-2xl font-bold mb-6">Create Variant ${variantIndex + 1}</h1>
                    <div class="mb-4">
                        <label for="variant_name_${variantIndex}" class="block text-gray-700">Variant Name</label>
                        <input type="text" name="variant_name[]" class="w-full p-2 border border-gray-300 rounded mt-1" id="variant_name_${variantIndex}" required>
                    </div>
                    <div class="mb-4">
                        <label for="variant_size_${variantIndex}" class="block text-gray-700">Variant Size</label>
                        <input type="text" name="variant_size[]" class="w-full p-2 border border-gray-300 rounded mt-1" id="variant_size_${variantIndex}" required>
                    </div>
                    <div class="mb-4">
                        <label for="variant_color_${variantIndex}" class="block text-gray-700">Variant Color</label>
                        <input type="text" name="variant_color[]" class="w-full p-2 border border-gray-300 rounded mt-1" id="variant_color_${variantIndex}">
                    </div>
                    <div class="mb-4">
                        <label for="variant_price_${variantIndex}" class="block text-gray-700">Variant Price</label>
                        <input type="number" name="variant_price[]" class="w-full p-2 border border-gray-300 rounded mt-1" id="variant_price_${variantIndex}" step="0.01">
                    </div>
                    <div class="mb-4">
                        <label for="variant_stock_${variantIndex}" class="block text-gray-700">Variant Stock</label>
                        <input type="number" name="variant_stock[]" class="w-full p-2 border border-gray-300 rounded mt-1" id="variant_stock_${variantIndex}" value="0" required>
                    </div>
                    <div class="mb-4">
                        <label for="variant_image_${variantIndex}" class="block text-gray-700">Variant Image</label>
                        <input type="file" name="variant_image[]" class="w-full p-2 border border-gray-300 rounded mt-1" id="variant_image_${variantIndex}">
                    </div>
                    <div>
                        <button type="button" class="bg-red-500 text-white px-4 py-2 rounded" onclick="removeVariant(this)">Remove Variant</button>
                    </div>
                </div>
            `;

        variantContainer.insertAdjacentHTML('beforeend', variantForm);
    });

    function removeVariant(button) {
        button.closest('.variant-form').remove();
    }
</script>