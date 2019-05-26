<?php

namespace Models\panel;

use RedBeanPHP\R;

class Admins extends R
{

    public static function getAdmins(){
        return Admins::findAll('users');
    }

}