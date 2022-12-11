<?php

namespace App\Services;

use App\Repositories\Eloquent\HobbyRepository;

/**
 * Class HobbyService.
 */
class HobbyService
{
    public function __construct(
        public HobbyRepository $hobbyRepository
    ) { }
}
