<?php

use Controllers\auth\AuthController;
$auth = new AuthController();


Flight::route('GET /', array('Controllers\IndexController', 'index'));
Flight::route('GET /record/show/@id', array('Controllers\IndexController', 'show'));

Flight::route('GET /login', array('Controllers\auth\AuthController', 'loginPage'));
Flight::route('GET /register', array('Controllers\auth\AuthController', 'registerPage'));
Flight::route('GET /logout', array('Controllers\auth\AuthController', 'logout'));

Flight::route('POST /register',  function () use ($auth){
    $auth->register($_POST['login'], $_POST['password'], $_POST['password_verify']);
});
Flight::route('POST /login',  function () use ($auth) {
    $auth->login($_POST['login'],$_POST['password']);
});


Flight::route('GET /panel', array('Controllers\panel\PanelController', 'index'));
Flight::route('GET /panel/record/create', array('Controllers\panel\records\RecordController', 'index'));
Flight::route('GET /panel/record/delete/@id', array('Controllers\panel\records\RecordController', 'delete'));
Flight::route('GET /panel/record/edit/@id', array('Controllers\panel\records\RecordController', 'edit'));

Flight::route('POST /panel/record/preview', array('Controllers\panel\records\RecordController', 'preview'));
Flight::route('POST /panel/record/create', array('Controllers\panel\records\RecordController', 'create'));
Flight::route('POST /panel/record/delete/@id', array('Controllers\panel\records\RecordController', 'delete'));
Flight::route('POST /panel/record/update', array('Controllers\panel\records\RecordController', 'update'));









