<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserType;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Services\UserService;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        session(['last_search_input' => $search]);
        $users = User::with('userType') // Eager load the userType relationship
            ->when($search, function ($query, $search) {
                return $query->where('first_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            })
            ->paginate(10);
        $userTypes = UserType::all();
        return view('admin.users.index', compact('users', 'userTypes'));
    }

    public function store(StoreUserRequest $request)
    {
        $this->userService->createUser($request->validated());

        return response()->json(['message' => 'User created successfully']);
    }

    public function edit($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Return the user as an array
        return response()->json(['user' => $user->toArray()]);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $this->userService->updateUser($request->validated(), $id);
        return response()->json(['message' => 'User updated successfully']);
    }

    /**
     * Delete the user's account.
     */
    public function destroy(User $user)
    {
        // Check if the user is not an admin (assuming is_admin is a boolean or integer field)
        if ($user->is_admin == 0) {
            $user->delete();
            return redirect()->back()->with('success', 'User deleted successfully.');
        } else {
            // Redirect back with an error message or handle as per your application's logic
            return redirect()->back()->with('error', 'Cannot delete admin users.');
        }
    }
}
