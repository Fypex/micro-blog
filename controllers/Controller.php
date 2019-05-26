<?php

namespace Controllers;

use Flight;

class Controller
{

    /**
     * @param $status
     * @param $message
     * @return string
     */
    protected static function return_json($status, $message)
    {
        echo json_encode([
            'status' => $status,
            'message' => $message
        ]);
        exit();
    }

    public static function auth(){
        if (!$_SESSION['user']){
            exit(Flight::redirect('/login'));
        }
    }

}