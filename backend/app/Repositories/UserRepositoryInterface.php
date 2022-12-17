<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{
    /**
     * Generic Setters
     */
    public function createUser(array $data): User;
    public function createUsers(array $data): Collection;

    /**
     * Generic Getters
     */
    public function getUsers(array|string $get = ['*']): Collection;
    public function getUsersWith(array|string|null $with = null, array|string $get = ['*']): Collection;
    public function getUsersFilterable(array|null $filter = null, array|string $get = ['*']): Collection;
    public function getUsersFilterableWith(array|null $filter = null, array|string|null $with = null, array|string $get = ['*']): Collection;

    /**
     * Specific Getters
     */
    public function getUsersFilterableWithCity(array|null $filter = null, array|string $get = ['*']): Collection;
}
