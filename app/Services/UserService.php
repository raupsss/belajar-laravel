<?php

namespace App\Services;

// use App\Services\UserService;

interface UserService
{
    function login(string $user, string $password): bool;

}
