<?php

namespace Controllers;

use Models\_Users as Model_Users;

class UserController
{
	public static function register($name)
	{
      _Users::register($name);
	}

}
