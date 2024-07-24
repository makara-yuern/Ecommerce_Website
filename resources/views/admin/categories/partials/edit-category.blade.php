<!-- Edit Category Modal -->
<div id="editCategoryModal" class="fixed top-0 left-0 right-0 bottom-0 flex items-center justify-center bg-gray-900 bg-opacity-50 z-50 hidden">
    <div class="bg-white rounded-lg p-8 max-w-2xl w-full">
        <h1 class="text-2xl font-bold mb-4">Edit Category</h1>
        <form id="editCategoryForm" method="POST" class="flex flex-col gap-4">
            @csrf
            @method('PUT')

            <input type="hidden" name="category_id" id="edit-category-id">

            <div>
                <label for="edit-category-name" class="block mb-1 name-input">Category Name</label>
                <input type="text" name="name" id="edit-category-name" required class="w-full px-3 py-2 border border-gray-300 rounded-md">
                <div id="edit-error-name" class="text-red-500 mt-1"></div>
            </div>
            <div>
                <label for="edit-category-description" class="block mb-1 name-input">Description</label>
                <textarea name="description" id="edit-category-description" rows="4" required class="w-full px-3 py-2 border border-gray-300 rounded-md"></textarea>
                <div id="edit-error-description" class="text-red-500 mt-1"></div>
            </div>

            <div class="flex items-center mt-4 space-x-4">
                <button type="submit" id="update-category" class="rounded-md transition-colors duration-200 bg-blue-500 text-white px-4 py-2 hover:bg-blue-600">
                    Update
                </button>
                <a href="#" id="closeEditModal" class="text-center rounded-md bg-gray-200 px-4 py-2 hover:bg-gray-300">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Open edit category modal
        $('.openEditCategoryModal').on('click', function() {
            var categoryId = $(this).data('category-id');
            console.log(categoryId);
            // Populate modal fields via AJAX
            $.ajax({
                url: '/categories/' + categoryId + '/edit',
                type: 'GET',
                success: function(response) {
                    // Populate modal fields
                    $('#edit-category-id').val(response.category.id);
                    $('#edit-category-name').val(response.category.name);
                    $('#edit-category-description').val(response.category.description);

                    // Update form action with category ID
                    $('#editCategoryForm').attr('action', '/categories/' + response.category.id);

                    // Show modal
                    $('#editCategoryModal').removeClass('hidden');
                }
            });
        });

        // Close edit category modal
        $('#closeEditModal').on('click', function() {
            $('#editCategoryModal').addClass('hidden');
        });

        // Submit edit category form via AJAX
        $('#editCategoryForm').on('submit', function(event) {
            event.preventDefault();
            var formData = $(this).serializeArray();
            var actionUrl = $(this).attr('action');

            $.ajax({
                url: actionUrl,
                type: 'POST',
                data: formData,
                success: function(response) {
                    // Handle success
                    console.log(response);
                    // Optionally close modal or show success message
                    window.location.href = "{{ route('category-management') }}";
                },
                error: function(xhr) {
                    // Handle errors
                    console.log(xhr.responseText);
                    var errors = xhr.responseJSON.errors;
                    // Display errors in your form
                    if (errors.name) {
                        $('#edit-error-name').text(errors.name[0]);
                    }
                    if (errors.description) {
                        $('#edit-error-description').text(errors.description[0]);
                    }
                }
            });
        });

    });
</script>