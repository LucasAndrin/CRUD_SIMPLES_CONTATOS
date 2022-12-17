<?php

namespace App\Repositories\Eloquent;

use App\Models\Hobby;
use App\Models\User;
use App\Repositories\HobbyRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use TimWassenburg\RepositoryGenerator\Repository\BaseRepository;

/**
 * Class HobbyRepository.
 */
class HobbyRepository extends BaseRepository implements HobbyRepositoryInterface
{
    /**
     * UserRepository constructor.
     *
     * @param Hobby $model
     */
    public function __construct(Hobby $model)
    {
        parent::__construct($model);
    }

    public function createHobbyByUser(User $user, array $data): Hobby
    {
        return $user->hobbies()->create($data);
    }

    public function createHobbiesByUser(User $user, array $data): Collection
    {
        return $user->hobbies()->createMany($data);
    }
}
