<?php
/**
 * Created by PhpStorm.
 * User: mizik
 * Date: 24.05.2019
 * Time: 22:15
 */

namespace Controllers;

use Flight;
use Controllers\panel\records\RecordController;

class IndexController
{

    public static function index(){
        $records = RecordController::getRecords();
        Flight::render('index', array(
            'records' => $records,
            'title' => $_ENV['ST_NAME']
        ));
    }


    public static function show($id){
        $record = RecordController::getRecord($id);
        Flight::render('record', array(
            'record' => $record,
            'title' => $_ENV['ST_NAME']." - ".$record['title']
        ));
    }
}