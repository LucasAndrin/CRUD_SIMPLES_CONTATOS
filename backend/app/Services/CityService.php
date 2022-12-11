<?php

namespace App\Services;

use App\Repositories\Eloquent\CityRepository;

/**
 * Class CityService.
 */
class CityService
{
    public function __construct(
        public CityRepository $cityRepository
    ) { }
}
