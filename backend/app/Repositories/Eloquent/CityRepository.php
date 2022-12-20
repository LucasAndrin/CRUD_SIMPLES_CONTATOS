<?php

namespace App\Repositories\Eloquent;

use App\Models\City;
use App\Repositories\CityRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
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

    public function getCities(array|null $filter = null, array|string $get = ['*']): Collection
    {
        return $this->model->filter($filter)->oldest()->get($get);
    }

    public function getCityByUuid(string $uuid): City
    {
        return $this->model->findByUuid($uuid);
    }

    public function deleteCityByUuid(string $uuid): int
    {
        return $this->model->where('uuid', $uuid)->delete();
    }
}
