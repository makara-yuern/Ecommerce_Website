<!-- Create Category Modal -->
<div id="createCategoryModal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 z-50 hidden">
    <div class="bg-white rounded-lg p-8 max-w-2xl w-full shadow-lg">
        <h1 class="text-2xl font-semibold mb-6">Create Category</h1>
        <form id="createCategoryForm" action="{{ route('categories.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="create-category-name" class="block text-sm font-medium text-gray-700 mb-1">Category Name</label>
                <input type="text" name="name" id="create-category-name" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Enter your category name">
                <div id="error-name" class="text-red-500 text-sm mt-1"></div>
            </div>

            <div>
                <label for="create-category-description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea name="description" id="create-category-description" rows="4" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Enter your description"></textarea>
                <div id="error-description" class="text-red-500 text-sm mt-1"></div>
            </div>
            <div class="flex items-center mt-4 space-x-4">
                <button type="submit" id="create-category" class="rounded-md transition-colors duration-200 bg-blue-500 text-white px-4 py-2 hover:bg-blue-600">
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

        // Open and close modal
        const createModal = document.getElementById('createCategoryModal');
        const openCreateModalButton = document.querySelector('.openCreateCategoryModal');
        const closeCreateModalButton = document.getElementById('closeCreateModal');
        const createForm = document.getElementById('createCategoryForm');
        const errorName = document.getElementById('error-name');
        const errorDescription = document.getElementById('error-description');

        openCreateModalButton.addEventListener('click', (e) => {
            e.preventDefault();
            createModal.classList.remove('hidden');
        });

        closeCreateModalButton.addEventListener('click', (e) => {
            e.preventDefault();
            createModal.classList.add('hidden');
        });

        // Handle create category form submission
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
                    } else {
                        window.location.href = "{{ route('category-management') }}";
                    }
                })
                .catch(error => {
                    console.error('Error creating category:', error);
                });
        });
    });
</script>