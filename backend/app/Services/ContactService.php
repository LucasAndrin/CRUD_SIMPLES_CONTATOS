<?php

namespace App\Services;

use App\Models\Hobby;
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
        $this->hobbyRepository = new HobbyRepository(new Hobby());
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
                'sex' => $user->sex->name,
                'city' => $user->city->name
            ];
        });
    }

    public function getContact(string $uuid): array
    {
        $user = $this->userRepository->getUserByUuidWith($uuid, ['city', 'hobbies']);

        return [
            'uuid' => $user->uuid,
            'name' => $user->name,
            'email' => $user->email,
            'age' => $user->age,
            'telephone' => $user->telephone,
            'sex' => $user->sex,
            'created_at' => $user->created_at,
            'city' => $user->city->only(['uuid', 'name']),
            'hobbies' => $user->hobbies->map(function ($hobby) {
                return $hobby->only(['uuid', 'descript']);
            })
        ];
    }

    public function updateContact(array $contactData, $hobbiesData): array
    {
        $user = $this->userRepository->getUserByUuidWith($contactData['uuid'], 'city');

        $this->userRepository->updateUserByUser($user, $contactData);

        $hobbies = $this->hobbyRepository->getHobbiesByUuid(array_column($hobbiesData, 'uuid'));

        foreach ($hobbies as $key => $hobby) {
            $this->hobbyRepository->updateHobbyByHobby($hobby, $hobbies[$key]);
        }

        return [
            'contact' => $user,
            'city' => $user->city->only(['uuid', 'name']),
            'hobbies' => $hobbies->hobbies->map(function ($hobby) {
                return $hobby->only(['uuid', 'descript']);
            })
        ];
    }

    public function deleteContact(string $uuid): int
    {
        return $this->userRepository->deleteUserByUuid($uuid);
    }
}
