<?php

namespace App\Repositories;

use App\Models\UserContact;
use App\Repositories\BaseRepository;


class UserContactRepository extends BaseRepository
{

    public function model()
    {
        return UserContact::class;
    }
}
