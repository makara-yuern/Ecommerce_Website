<!-- Create User Modal -->
<div id="createUserModal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 z-50 hidden">
    <div class="bg-white rounded-lg p-8 max-w-2xl w-full shadow-lg">
        <h1 class="text-2xl font-semibold mb-6">Create User</h1>
        <form id="createUserForm" action="{{ route('users.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- First name -->
                <div>
                    <label for="create-first-name" class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                    <input type="text" name="first_name" id="create-first-name" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Enter your first name">
                    <div id="error-name" class="text-red-500 text-sm mt-1"></div>
                </div>
                <!-- Last name -->
                <div>
                    <label for="create-last-name" class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                    <input type="text" name="last_name" id="create-last-name" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Enter your last name">
                    <div id="error-name" class="text-red-500 text-sm mt-1"></div>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- select country -->
                <div class="select-user-country">
                    <label for="userCountry" class="mb-1">Select a Country</label>
                    <select id="userCountry" name="country_code" class="form-select-user-country custom-select">
                        <option value=""></option>
                        @foreach(config('countries') as $code => $country)
                        <option value="{{ $code }}">{{ $country['flag'] }} {{ $country['name'] }}</option>
                        @endforeach
                    </select>
                    <div id="error-country" class="text-red-500 mt-1"></div>
                </div>
                <!-- select user type -->
                <div class="select-user-type">
                    <label for="userType" class="mb-1">User Type</label>
                    <select id="userType" name="user_type_id" required class="form-select-user-type custom-select">
                        <option value="">Select User Type</option>
                        @foreach($userTypes as $userType)
                        <option value="{{ $userType->id }}">{{ $userType->type }}</option>
                        @endforeach
                    </select>
                    <div id="error-user-type" class="text-red-500 text-sm mt-1"></div>
                </div>
            </div>

            <!-- Email -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="create-email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" id="create-email" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Enter your email">
                    <div id="error-email" class="text-red-500 text-sm mt-1"></div>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Is Admin -->
                <div class="admin">
                    <span class="ml-2 mb-1">Admin</span>
                    <input type="checkbox" name="isAdmin" id="isAdmin" class="toggle-checkbox hidden">
                    <label for="isAdmin" class="toggle-label relative flex items-center cursor-pointer">
                        <span class="block w-12 h-6 rounded-full bg-gray-300"></span>
                        <span class="toggle-thumb block w-6 h-6 rounded-full bg-white absolute transition-transform duration-300 transform"></span>
                    </label>
                </div>
                <!-- Is Active -->
                <div class="status">
                    <span class="ml-2 mb-1">Status</span>
                    <input type="checkbox" name="isActive" id="isActive" class="toggle-checkbox hidden">
                    <label for="isActive" class="toggle-label relative flex items-center cursor-pointer">
                        <span class="block w-12 h-6 rounded-full bg-gray-300"></span>
                        <span class="toggle-thumb block w-6 h-6 rounded-full bg-white absolute transition-transform duration-300 transform"></span>
                    </label>
                </div>
            </div>
            
            <!-- Password -->
            <div>
                <label for="create-password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" name="password" id="create-password" required class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Enter your password">
                <div id="error-password" class="text-red-500 text-sm mt-1"></div>
            </div>

            <!-- Choose image -->
            <div>
                <label for="avatar" class="block text-sm font-medium text-gray-700 mb-1">Avatar Image</label>
                <input type="file" name="avatar" id="avatar" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                <div id="error-avatar" class="text-red-500 text-sm mt-1"></div>
            </div>

            <div class="flex items-center mt-4 space-x-4">
                <!-- Create form -->
                <button type="submit" id="create-user" class="rounded-md transition-colors duration-200 bg-blue-500 text-white px-4 py-2 hover:bg-blue-600">
                    Create
                </button>
                <!-- Cancel form -->
                <a href="#" id="closeCreateModal" class="text-center rounded-md bg-gray-200 px-4 py-2 hover:bg-gray-300">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {

        $('.form-select-user-country').select2({
            placeholder: 'Select a country',
            width: 'resolve',
        });

        $('.form-select-user-type').select2({
            placeholder: 'Select a User type',
            width: 'resolve',
        });

        // Open and close modal
        const createModal = document.getElementById('createUserModal');
        const openCreateModalButton = document.querySelector('.openCreateUserModal');
        const closeCreateModalButton = document.getElementById('closeCreateModal');
        const createForm = document.getElementById('createUserForm');
        const errorName = document.getElementById('error-name');
        const errorEmail = document.getElementById('error-email');
        const errorPassword = document.getElementById('error-password');

        openCreateModalButton.addEventListener('click', (e) => {
            e.preventDefault();
            createModal.classList.remove('hidden');
        });

        closeCreateModalButton.addEventListener('click', (e) => {
            e.preventDefault();
            createModal.classList.add('hidden');
        });

        // Handle create user form submission
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
                        errorEmail.textContent = data.errors.email ? data.errors.email[0] : '';
                        errorPassword.textContent = data.errors.password ? data.errors.password[0] : '';
                    } else {
                        window.location.href = "{{ route('user-management') }}";
                    }
                })
                .catch(error => {
                    console.error('Error creating user:', error);
                });
        });
    });
</script>