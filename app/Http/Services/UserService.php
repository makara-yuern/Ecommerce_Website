<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function createUser(array $data)
    {
        $user = new User();
        $user->first_name = $data['first_name'];
        $user->last_name = $data['last_name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->country_code = $data['country_code'];
        $user->user_type_id = $data['user_type_id'];
        $user->is_admin = $data['isAdmin'] ?? false;
        $user->status = $data['isActive'] ?? false;

        if (isset($data['avatar'])) {
            $avatarPath = $data['avatar']->store('avatars', 'public');
            $user->avatar = $avatarPath;
        }

        $user->save();

        return $user;
    }

    public function updateUser(array $data, $userId)
    {
        $user = User::findOrFail($userId);

        $user->first_name = $data['first_name'] ?? $user->first_name;
        $user->last_name = $data['last_name'] ?? $user->last_name;
        $user->email = $data['email'] ?? $user->email;
        $user->country_code = $data['country_code'] ?? $user->country_code;
        $user->user_type_id = $data['user_type_id'] ?? $user->user_type_id;
        $user->is_admin = isset($data['isAdmin']) ? (bool)$data['isAdmin'] : $user->is_admin;
        $user->status = isset($data['isActive']) ? (bool)$data['isActive'] : $user->status;

        $user->save();
    }
}
