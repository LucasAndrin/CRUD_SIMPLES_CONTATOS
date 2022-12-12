<?php

namespace App\Services;

use App\Enums\UserSex;
use App\Models\User;
use App\Repositories\Eloquent\UserRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as SupportCollection;

/**
 * Class UserService.
 */
class UserService
{
    private UserRepository $userRepository;

    public function __construct() {
        $this->userRepository = new UserRepository(new User());
    }

    public function getUsers(): SupportCollection
    {
        $users = $this->userRepository->getUsers(['*'], ['city']);

        return $users->map(function ($user) {
            return [
                'uuid' => $user->uuid,
                'name' => $user->name,
                'email' => $user->email,
                'age' => $user->age,
                'telephone' => $user->telephone,
                'sex' => $user->sex->name,
                'city' => $user->city->name
            ];
        });
    }
}
