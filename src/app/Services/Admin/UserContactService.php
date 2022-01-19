<?php

namespace App\Services\Admin;

use App\Services\BaseService;
use App\Repositories\UserContactRepository;
use Illuminate\Support\Facades\Hash;

class UserContactService extends BaseService
{
    protected $userContactRepository;

    public function __construct(UserContactRepository $userContactRepository)
    {
        $this->userContactRepository = $userContactRepository;
    }

    public function getContactList()
    {
        return $this->userContactRepository->getContactList();
    }

    public function delete($id)
    {
        return $this->userContactRepository->delete($id);
    }
}
