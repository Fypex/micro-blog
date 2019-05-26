<?php

namespace Controllers\panel;

use Controllers\Controller;
use Flight;
use Controllers\panel\records\RecordController;


class PanelController extends Controller
{

    public static function index(){
        self::auth();

        Flight::render('panel/index', array(
            'title' => 'AutoDonate - Админ панель',
            'records' => RecordController::getRecords(),
        ));
    }


}