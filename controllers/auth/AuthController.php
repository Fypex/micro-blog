<?php

namespace Controllers\auth;

use Flight;
use Models\Users as User;
use Controllers\Controller as Controller;

class AuthController extends Controller
{

    private $pwd_length = 3;

    public function loginPage(){
        if ($_SESSION['user']){
            exit(Flight::redirect('/panel'));
        }
        Flight::render('auth/login', array('title' => $_ENV['ST_NAME'].' - Админ панель'));
    }
    public function registerPage(){
        if ($_SESSION['user']){
            exit(Flight::redirect('/panel'));
        }
        Flight::render('auth/register', array('title' => $_ENV['ST_NAME'].' - Админ панель'));
    }
    /**
     * @param $login
     * @param $password
     */
    public function login($login, $password)
    {
        $user = User::findOne('users','login = ?',array($login));
        if (!empty($user->login) and password_verify($password, $user->password))
        {
            $this->initUserSession($user);

        }else{
            $this->return_json(
                'error',
                'Не верный пароль или логин'
            );
        }


    }

    /**
     * @param $user
     */
    private function initUserSession($user)
    {
        $_SESSION['role'] = $user->role;
        $_SESSION['login'] = $user->login;
        $_SESSION['user'] = $user;

        $this->return_json(
            'success',
            'Вы авторизованы'
        );
    }

    /**
     * @param $login
     * @param $password
     * @param $password_verify
     */
    public function register($login, $password, $password_verify)
    {

        $this->checkLogin($login);
        $this->checkPassword($password,$password_verify);

        User::createUser($login, $this->hashPass($password));

        $this->return_json(
            'success',
            'Пользователь создан'
        );
    }


    public function logout()
    {
        session_unset();
        session_destroy();
        Flight::redirect('/login');
    }
    /**
     * @param $password
     * @return bool|string
     */
    private function hashPass($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }


    /**
     * @param $login
     */
    private function checkLogin($login)
    {
        $user = User::findOne('users', 'login = ?',array($login));

        if (empty($login))
        {
            $this->return_json(
                'error',
                'Введите логин'
            );
        }

        if(preg_match('/[^A-Za-z0-9]/', $login))
        {
            $this->return_json(
                'error',
                'Логин содержит недопустимые символы'
            );
        }

        if ($user){
            $this->return_json(
                'error',
                'Логин занят другим пользователем'
            );
        }
    }


    /**
     * @param $password
     * @param $password_verify
     */
    private function checkPassword($password, $password_verify)
    {

        if (strlen($password) < $this->pwd_length)
        {
            $this->return_json(
                'error',
                'Минимальная длина пароля '.$this->pwd_length.' символа'
            );
        }
        if ($password != $password_verify)
        {
            $this->return_json(
                'error',
                'Пароли не совпадают'
            );
        }

    }


}