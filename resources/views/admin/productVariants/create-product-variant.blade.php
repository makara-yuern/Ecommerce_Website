<!-- Variant form container -->
<div id="variantFormContainer" class="mt-6">
    <h2 class="text-2xl font-bold mb-4">Create Variants</h2>
    <div id="variantForms">
        <!-- Initial variant form -->
        <div class="variant-form mb-4 p-4 border border-gray-300 rounded-lg shadow-lg bg-white">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold">Variant 1</h3>
                <button type="button" class="remove-variant bg-red-500 text-white px-2 py-1 rounded-lg hover:bg-red-600">Remove</button>
            </div>
            <form action="{{ route('product_variants.store') }}" method="POST" class="space-y-4">
                @csrf
                <div class="form-group">
                    <label for="variant_name" class="block text-gray-700 font-medium mb-1">Variant Name</label>
                    <input type="text" name="variant_name[]" class="form-control border border-gray-300 rounded-lg p-2 w-full" id="variant_name" required>
                </div>
                <div class="form-group">
                    <label for="variant_size" class="block text-gray-700 font-medium mb-1">Variant Size</label>
                    <input type="text" name="variant_size[]" class="form-control border border-gray-300 rounded-lg p-2 w-full" id="variant_size" required>
                </div>
                <div class="form-group">
                    <label for="variant_color" class="block text-gray-700 font-medium mb-1">Variant Color</label>
                    <input type="text" name="variant_color[]" class="form-control border border-gray-300 rounded-lg p-2 w-full" id="variant_color">
                </div>
                <div class="form-group">
                    <label for="variant_price" class="block text-gray-700 font-medium mb-1">Variant Price</label>
                    <input type="number" name="variant_price[]" class="form-control border border-gray-300 rounded-lg p-2 w-full" id="variant_price" step="0.01">
                </div>
                <div class="form-group">
                    <label for="variant_stock" class="block text-gray-700 font-medium mb-1">Variant Stock</label>
                    <input type="number" name="variant_stock[]" class="form-control border border-gray-300 rounded-lg p-2 w-full" id="variant_stock" value="0">
                </div>
            </form>
        </div>
    </div>
    <button type="button" id="addVariantForm" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Add Another Variant</button>
</div>

<script>
    document.getElementById('addVariantForm').addEventListener('click', function() {
        var variantForms = document.getElementById('variantForms');
        var variantCount = variantForms.querySelectorAll('.variant-form').length + 1;

        var newForm = document.createElement('div');
        newForm.className = 'variant-form mb-4 p-4 border border-gray-300 rounded-lg shadow-lg bg-white';
        newForm.innerHTML = `
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-semibold">Variant ${variantCount}</h3>
            <button type="button" class="remove-variant bg-red-500 text-white px-2 py-1 rounded-lg hover:bg-red-600">Remove</button>
        </div>
        <form action="{{ route('product_variants.store') }}" method="POST" class="space-y-4">
            @csrf
            <div class="form-group">
                <label for="variant_name_${variantCount}" class="block text-gray-700 font-medium mb-1">Variant Name</label>
                <input type="text" name="variant_name[]" class="form-control border border-gray-300 rounded-lg p-2 w-full" id="variant_name_${variantCount}" required>
            </div>
            <div class="form-group">
                <label for="variant_size_${variantCount}" class="block text-gray-700 font-medium mb-1">Variant Size</label>
                <input type="text" name="variant_size[]" class="form-control border border-gray-300 rounded-lg p-2 w-full" id="variant_size_${variantCount}" required>
            </div>
            <div class="form-group">
                <label for="variant_color_${variantCount}" class="block text-gray-700 font-medium mb-1">Variant Color</label>
                <input type="text" name="variant_color[]" class="form-control border border-gray-300 rounded-lg p-2 w-full" id="variant_color_${variantCount}">
            </div>
            <div class="form-group">
                <label for="variant_price_${variantCount}" class="block text-gray-700 font-medium mb-1">Variant Price</label>
                <input type="number" name="variant_price[]" class="form-control border border-gray-300 rounded-lg p-2 w-full" id="variant_price_${variantCount}" step="0.01">
            </div>
            <div class="form-group">
                <label for="variant_stock_${variantCount}" class="block text-gray-700 font-medium mb-1">Variant Stock</label>
                <input type="number" name="variant_stock[]" class="form-control border border-gray-300 rounded-lg p-2 w-full" id="variant_stock_${variantCount}" value="0">
            </div>
        </form>
    `;

        variantForms.appendChild(newForm);
    });

    document.getElementById('variantForms').addEventListener('click', function(event) {
        if (event.target.classList.contains('remove-variant')) {
            var formToRemove = event.target.closest('.variant-form');
            formToRemove.remove();
        }
    });

    document.getElementById('showVariantForm').addEventListener('click', function() {
        var variantForm = document.getElementById('variantForm');
        if (variantForm.classList.contains('hidden')) {
            variantForm.classList.remove('hidden');
            this.textContent = 'Hide Variant Form';
        } else {
            variantForm.classList.add('hidden');
            this.textContent = 'Create Variant';
        }
    });
</script>