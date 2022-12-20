<?php

namespace App\Rules;

use App\Models\City;
use App\Repositories\Eloquent\CityRepository;
use Illuminate\Contracts\Validation\InvokableRule;

class CityHasNoUsers implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        $cityRepository = new CityRepository(new City());

        $city = $cityRepository->getCityByUuid($value);

        if ($city->users()->count()) {
            $fail('This city cannot be deleted!');
        }
    }
}
