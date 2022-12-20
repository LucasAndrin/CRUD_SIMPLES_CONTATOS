<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use TimWassenburg\RepositoryGenerator\Repository\BaseRepository;

/**
 * Class UserRepository.
 */
class UserRepository extends BaseRepository implements UserRepositoryInterface
{

    /**
     * UserRepository constructor.
     *
     * @param User $model
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function createUser(array $data): User
    {
        return $this->model->create($data);
    }

    public function createUsers(array $data): Collection
    {
        return $this->model->createMany($data);
    }

    public function getUsers(array|string $get = ['*']): Collection
    {
        return $this->model->latest()->get($get);
    }

    public function getUsersWith(array|string|null $with = null, array|string $get = ['*']): Collection
    {
        return $this->model->latest()->with($with)->get($get);
    }

    public function getUsersFilterable(array|null $filter = null, array|string $get = ['*']): Collection
    {
        return $this->model->latest()->filter($filter)->get($get);
    }

    public function getUsersFilterableWith(array|null $filter = null, array|string|null $with = null, array|string $get = ['*']): Collection
    {
        return $this->model->latest()->with($with)->filter($filter)->get($get);
    }

    public function getUsersFilterableWithCity(array|null $filter = null, array|string $get = ['*']): Collection
    {
        return $this->model->latest()->with('city')->filter($filter)->get($get);
    }

    public function getUserById(int $id, array|string $get = ['*']): User
    {
        return $this->model->select($get)->find($id);
    }

    public function getUserByUuid(string $uuid, array|string $get = ['*']): User
    {
        return $this->model->select($get)->findByUuid($uuid);
    }

    public function getUserByUuidWith(string $uuid, array|string|null $with = null, array|string $get = ['*']): User
    {
        return $this->model->select($get)->with($with)->findByUuid($uuid);
    }

    public function updateUserByUser(User &$user, $data): int
    {
        return $user->update($data);
    }

    public function deleteUserByUuid(string $uuid): int
    {
        return $this->model->where('uuid', $uuid)->delete();
    }
}
