<?php

namespace App\Services;

use App\Repositories\Eloquent\UserRepository;

/**
 * Class UserService.
 */
class UserService
{
    public function __construct(
        public UserRepository $userRepository
    ) { }
}
