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
        return $this->model->latest()->filter($filter)->get($get);
    }

    public function getCityByUuid(string $uuid): City
    {
        return $this->model->findByUuid($uuid);
    }

    public function createCity(array $data): City
    {
        return $this->model->create($data);
    }

    public function updateCity(string $uuid, array $data): int
    {
        return $this->model->where('uuid', $uuid)->update($data);
    }

    public function deleteCityByUuid(string $uuid): int
    {
        return $this->model->where('uuid', $uuid)->delete();
    }
}
