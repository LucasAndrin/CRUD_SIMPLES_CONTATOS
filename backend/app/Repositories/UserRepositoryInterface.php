<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{

    /**
     * Generic getters
     */
    public function getUsers(array|string $get = ['*']): Collection;
    public function getUsersWith(array|string|null $with = null, array|string $get = ['*']): Collection;
    public function getUsersFilterable(array|null $filter = null, array|string $get = ['*']): Collection;
    public function getUsersFilterableWith(array|null $filter = null, array|string|null $with = null, array|string $get = ['*']): Collection;

    /**
     * Specific getters
     */
    public function getUsersFilterableWithCity(array|null $filter = null, array|string $get = ['*']): Collection;
}
