<!-- Edit User Modal -->
<div id="editUserModal" class="fixed top-0 left-0 right-0 bottom-0 flex items-center justify-center bg-gray-900 bg-opacity-50 z-50 hidden">
    <div class="bg-white rounded-lg p-8 max-w-2xl w-full">
        <h1 class="text-2xl font-bold mb-4">Edit User</h1>
        <form id="editUserForm" action="{{ route('users.update', ':id') }}" method="POST" class="flex flex-col gap-4">
            @csrf
            @method('PUT')

            <input type="hidden" name="user_id" id="edit-user-id">

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- First name -->
                <div>
                    <label for="edit-first-name" class="block mb-1 name-input">First Name</label>
                    <input type="text" name="first_name" id="edit-first-name" required class="w-full px-3 py-2 border border-gray-300 rounded-md">
                    <div id="edit-error-name" class="text-red-500 mt-1"></div>
                </div>
                <!-- last name -->
                <div>
                    <label for="edit-last-name" class="block mb-1 name-input">Last Name</label>
                    <input type="text" name="last_name" id="edit-last-name" required class="w-full px-3 py-2 border border-gray-300 rounded-md">
                    <div id="edit-error-name" class="text-red-500 mt-1"></div>
                </div>
            </div>
            
            <!-- Email -->
            <div>
                <label for="edit-email" class="block mb-1 email-input">Email</label>
                <input type="email" name="email" id="edit-email" required class="w-full px-3 py-2 border border-gray-300 rounded-md">
                <div id="edit-error-email" class="text-red-500 mt-1"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Select country -->
                <div class="select-user-country">
                    <label for="edit-userCountry" class="mb-1">Select a Country</label>
                    <select id="edit-userCountry" name="country_code" class="form-select custom-select">
                        <option value=""></option>
                        @foreach(config('countries') as $code => $country)
                        <option value="{{ $code }}">{{ $country['flag'] }} {{ $country['name'] }}</option>
                        @endforeach
                    </select>
                    <div id="edit-error-country" class="text-red-500 mt-1"></div>
                </div>
                <!-- Select user type -->
                <div class="select-user-type">
                    <label for="edit-userType" class="mb-1">Select a Type</label>
                    <select id="edit-userType" name="user_type_id" class="form-select-user-type custom-select">
                        <option value=""></option>
                        @foreach($userTypes as $userType)
                        <option value="{{ $userType->id }}">{{ $userType->type }}</option>
                        @endforeach
                    </select>
                    <div id="edit-error-user-type" class="text-red-500 mt-1"></div>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Is Admin -->
                <div class="admin">
                    <span class="ml-2 mb-1">Admin</span>
                    <input type="checkbox" name="isAdmin" id="edit-isAdmin" class="toggle-checkbox hidden">
                    <label for="edit-isAdmin" class="toggle-label relative flex items-center cursor-pointer">
                        <span class="block w-12 h-6 rounded-full bg-gray-300"></span>
                        <span class="toggle-thumb block w-6 h-6 rounded-full bg-white absolute transition-transform duration-300 transform"></span>
                    </label>
                </div>
                <!-- Is Active -->
                <div class="status">
                    <span class="ml-2 mb-1">Status</span>
                    <input type="checkbox" name="isActive" id="edit-isActive" class="toggle-checkbox hidden">
                    <label for="edit-isActive" class="toggle-label relative flex items-center cursor-pointer">
                        <span class="block w-12 h-6 rounded-full bg-gray-300"></span>
                        <span class="toggle-thumb block w-6 h-6 rounded-full bg-white absolute transition-transform duration-300 transform"></span>
                    </label>
                </div>
            </div>

            <div class="flex items-center mt-4 space-x-4">
                <!-- Update form -->
                <button type="submit" id="update-user" class="rounded-md transition-colors duration-200 bg-blue-500 text-white px-4 py-2 hover:bg-blue-600">
                    Update
                </button>
                <!-- Cancel form -->
                <a href="#" id="closeEditModal" class="text-center rounded-md bg-gray-200 px-4 py-2 hover:bg-gray-300">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.form-select').select2({
            placeholder: 'Select a country',
            width: 'resolve',
        });

        $('.form-select-user-type').select2({
            placeholder: 'Select a User type',
            width: 'resolve',
        });

        // Open edit user modal
        $('.openEditUserModal').on('click', function() {
            var userId = $(this).data('user-id');
            console.log(userId);
            // Populate modal fields via AJAX
            $.ajax({
                url: '/users/' + userId + '/edit',
                type: 'GET',
                success: function(response) {
                    // Populate modal fields
                    $('#edit-user-id').val(response.user.id);
                    $('#edit-first-name').val(response.user.first_name);
                    $('#edit-last-name').val(response.user.last_name);
                    $('#edit-email').val(response.user.email);
                    $('#edit-userCountry').val(response.user.country_code).trigger('change');
                    $('#edit-userType').val(response.user.user_type_id).trigger('change'); // Update this line

                    $('#edit-isAdmin').prop('checked', response.user.is_admin);
                    $('#edit-isActive').prop('checked', response.user.status);

                    // Show modal
                    $('#editUserModal').removeClass('hidden');
                }
            });
        });

        // Close edit user modal
        $('#closeEditModal').on('click', function() {
            $('#editUserModal').addClass('hidden');
        });

        // Submit edit user form via AJAX
        $('#editUserForm').on('submit', function(event) {
            event.preventDefault();
            var formData = $(this).serializeArray();

            // Convert isAdmin and isActive to boolean
            formData.push({
                name: 'isAdmin',
                value: $('#edit-isAdmin').is(':checked') ? 1 : 0
            });
            formData.push({
                name: 'isActive',
                value: $('#edit-isActive').is(':checked') ? 1 : 0
            });

            $.ajax({
                url: '/users/' + $('#edit-user-id').val(),
                type: 'PUT',
                data: formData,
                success: function(response) {
                    // Handle success
                    console.log(response);
                    // Optionally close modal or show success message
                    window.location.href = "{{ route('user-management') }}";
                },
                error: function(xhr) {
                    // Handle errors
                    console.log(xhr.responseText);
                    var errors = xhr.responseJSON.errors;
                    // Display errors in your form
                    if (errors.name) {
                        $('#edit-error-name').text(errors.name[0]);
                    }
                    if (errors.email) {
                        $('#edit-error-email').text(errors.email[0]);
                    }
                    if (errors.country_code) {
                        $('#edit-error-country').text(errors.country_code[0]);
                    }
                    if (errors.user_type_id) {
                        $('#edit-error-user-type').text(errors.user_type_id[0]);
                    }
                }
            });
        });

    });
</script>