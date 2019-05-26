<?php

namespace Models;

use RedBeanPHP\R as R;

class Users extends R
{

    /**
     * @param $login
     * @param $password
     */
    public static function createUser($login, $password)
    {
        $user = Users::dispense('users');
        $user->login = $login;
        $user->role = 'user';
        $user->password = $password;
        $user->key = '';
        Users::store($user);
    }


}