<?php

namespace App\Repositories\Eloquent;

use App\Models\City;
use App\Repositories\CityRepositoryInterface;
use TimWassenburg\RepositoryGenerator\Repository\BaseRepository;

/**
 * Class CityRepository.
 */
class CityRepository extends BaseRepository implements CityRepositoryInterface
{
    /**
     * UserRepository constructor.
     *
     * @param City $model
     */
    public function __construct(City $model)
    {
        parent::__construct($model);
    }
}
