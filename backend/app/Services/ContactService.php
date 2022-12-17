<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Eloquent\HobbyRepository;
use App\Repositories\Eloquent\UserRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as SupportCollection;

class ContactService
{
    private UserRepository $userRepository;

    private HobbyRepository $hobbyRepository;

    public function __construct() {
        $this->userRepository = new UserRepository(new User());
    }

    public function getContacts(array $filter): SupportCollection
    {
        $users = $this->userRepository->getUsersFilterableWithCity($filter);

        return $users->map(function ($user) {
            return [
                'uuid' => $user->uuid,
                'name' => $user->name,
                'email' => $user->email,
                'age' => $user->age,
                'telephone' => $user->telephone,
                'sex' => $user->sex,
                'city' => $user->city->name
            ];
        });
    }

    public function createContact(array $contact, array $hobbies): array
    {
        $contact = $this->userRepository->createUser($contact);

        $hobbies = $this->hobbyRepository->createHobbiesByUser($contact, $hobbies);

        return [
            'contact' => $contact,
            'hobbies' => $hobbies
        ];
    }
}
