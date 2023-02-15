<?php

namespace App\Services\impl;

use App\Services\UserService;


class UserServiceImpl implements UserService
{


    // function login(string $user, string $password): bool{
//     if(!isset($this->users[$user])){
//         return false;
//     }

    //     $correctPassword = $this->$users[$user];
//     return $password == $correctPassword;
// }
    /**
     * @param string $user
     * @param string $password
     * @return bool
     */
    private array $users = [
        "ghani" => "rahasia"
    ];
    public function login(string $user, string $password): bool
    {
        if (!isset($this->users[$user])) {
            return false;
        }

        $correctPassword = $this->users[$user];
        return $password == $correctPassword;
    }
}
