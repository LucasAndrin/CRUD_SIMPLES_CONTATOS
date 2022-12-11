<?php

namespace App\Repositories\Eloquent;

use App\Models\Hobby;
use App\Repositories\HobbyRepositoryInterface;
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
}
