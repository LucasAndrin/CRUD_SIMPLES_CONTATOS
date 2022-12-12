<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Eloquent\UserRepository;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class UserService.
 */
class UserService
{
    private UserRepository $userRepository;

    public function __construct() {
        $this->userRepository = new UserRepository(new User());
    }

    public function getUsers(): Collection
    {
        return $this->userRepository->getUsers();
    }
}
