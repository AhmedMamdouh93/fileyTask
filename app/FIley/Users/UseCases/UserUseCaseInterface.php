<?php

namespace App\Filey\Users\UseCases;
use App\Filey\Users\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface UserUseCaseInterface
{
    public function createUser($data);
    public function loginUser($data);
}
