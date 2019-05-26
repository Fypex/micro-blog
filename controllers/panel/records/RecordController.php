<?php
/**
 * Created by PhpStorm.
 * User: mizik
 * Date: 23.05.2019
 * Time: 20:21
 */

namespace Controllers\panel\records;

use Controllers\Controller;
use Flight;
use Models\panel\records\Records as Records;

class RecordController extends Controller
{

    public static function index(){
        self::auth();
        Flight::render('panel/records/create', array('title' => $_ENV['ST_NAME'].' - Создание записи'));
    }

    public static function preview(){
        self::auth();
        Flight::render('panel/records/preview', array(
            'title_record' => $_POST['title'],
            'editor' => $_POST['editor'],
            'date' => date('d.m.Y'),
            'image' => $_POST['imageFilePreview'],
            'author' => $_POST['author'],
            'title' => $_ENV['ST_NAME'].' - Предпросмотр записи'
        ));
    }

    public static function create(){
        self::auth();
        $record = Records::dispense('records');
        $record->title = $_POST['title'];
        $record->editor = $_POST['editor'];
        $record->date = date('d m Y');
        $record->image = $_POST['imageFilePreview'];
        $record->author = $_POST['author'];
        $id = Records::store($record);

        if (is_int($id)){
            self::return_json(true,'Запись опубликована');
        }else{
            self::return_json(false,'Ошибка, запись не опубликована');
        }

    }
    public static function getRecord($id)
    {
        return Records::findOne('records', 'id = ?',array($id));
    }

    public static function getRecords()
    {
        return Records::findAll('records');
    }

    public static function delete($id)
    {
        self::auth();
        $id = Records::load('records', $id);
        Records::trash($id);
        Flight::redirect('/panel');
    }

    public static function edit($id)
    {
        self::auth();
        $record = Records::findOne('records', 'id = ?', array($id));
        Flight::render('panel/records/edit', array(
            'record' => $record,
            'title' => $_ENV['ST_NAME'].' - Создание записи'
        ));
    }

    public static function update(){
        self::auth();
        $record = Records::load('records',$_POST['id']);
        $record->title = $_POST['title'];
        $record->editor = $_POST['editor'];
        $record->date = date('d.m.Y');
        $record->image = $_POST['imageFilePreview'];
        $record->author = $_POST['author'];
        $id = Records::store($record);

        if (is_int($id)){
            self::return_json(true,'Запись обновлена');
        }else{
            self::return_json(false,'Ошибка, запись не обновлена');
        }
    }
}

