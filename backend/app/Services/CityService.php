<?php

namespace App\Services;

use App\Models\City;
use App\Repositories\Eloquent\CityRepository;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class CityService.
 */
class CityService
{
    private CityRepository $cityRepository;

    public function __construct() {
        $this->cityRepository = new CityRepository(new City());
    }

    public function getCities(array|null $filter): Collection
    {
        return $this->cityRepository->getCities($filter, [
            'uuid',
            'name'
        ]);
    }

    public function createCity(string $name): City
    {
        return $this->cityRepository->createCity($name);
    }

    public function deleteCity(string $uuid): int
    {
        return $this->cityRepository->deleteCityByUuid($uuid);
    }
}
