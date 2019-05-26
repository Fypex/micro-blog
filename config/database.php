<?php

use \RedBeanPHP\R;


switch ($_ENV['DB_DRIVER']) {
	case 'mysql':
		R::setup( 'mysql:host='.$_ENV['DB_HOST'].';dbname='.$_ENV['DB_BASE'].'',$_ENV['DB_USER'],$_ENV['DB_PASS']);
		break;

	case 'sqlite':
		R::setup( 'sqlite:../storage/db/'.$_ENV['DB_FILE'].'.db' );
		break;

	default:
		   Flight::render('../views/errors/no_сonnection.php',array(
		   	'error' => 'Такого драйвера базы данных не существует!',
		   	'message' => '<h3>Отредактируйте файл <strong>.env</strong> данные для подключения!</h3>',
		   ));

		   exit();
		break;
}

if (!R::testConnection()){

   Flight::render('../views/errors/no_сonnection.php',array(
   	'error' => 'Подключение к базе данных отсутствует!',
   	'message' => '<h3>Добавьте в файл <strong>.env</strong> данные для подключения!</h3>',
   ));

   exit();
}