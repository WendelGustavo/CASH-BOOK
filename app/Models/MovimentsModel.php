<?php

namespace App\Models;

use CodeIgniter\Model;

class MovimentsModel extends Model
{
    public function listMovi()
    {
        $db = db_connect();
        $list = $db->query("SELECT * FROM moviment")->getResultArray();
        $db->close();
        return $list;
    }

    public function cash_balance()
    {
        $db = db_connect();
        $input = $db->query("SELECT sum(value) AS input FROM moviment WHERE type='input'")->getResultArray();
        $output = $db->query("SELECT sum(value) AS output FROM moviment WHERE type='output'")->getResultArray();
        $db->close();
        return $input[0]['input'] - $output[0]['output'];
    }

    public function input()
    {
        $db = db_connect();
        $input = $db->query("SELECT sum(value) AS input FROM moviment WHERE type='input'")->getResultArray();
        $db->close();
        return $input[0]['input'];
    }

    public function inputAll()
    {
        $db = db_connect();
        $input = $db->query("SELECT value AS input FROM moviment WHERE type='input'")->getResultArray();

        return $input;
    }

    public function output()
    {
        $db = db_connect();
        $output = $db->query("SELECT sum(value) AS output FROM moviment WHERE type='output'")->getResultArray();
        $db->close();
        return $output[0]['output'];
    }
    public function outputAll()
    {
        $db = db_connect();
        $output = $db->query("SELECT value AS output FROM moviment WHERE type='output'")->getResultArray();
        $db->close();
        return $output;
    }

    public function list()
    {
        $db = db_connect();
        $list = $db->query("SELECT DISTINCT m.date, 
        (select SUM(value) from moviment WHERE date = m.date AND type = 'input') AS input,
        (select sum(value) from moviment WHERE date = m.date AND type = 'output') AS output 
        FROM moviment m")->getResultArray();
        $db->close();
        return $list;
    }

    public function listFilrada()
    {
        $db = db_connect();
        $ano = $_POST['ano'];
        $mes = $_POST['mes'];
        $list = $db->query("SELECT * FROM moviment WHERE YEAR(date) = $ano AND MONTH(date) = $mes")->getResultArray();
        $db->close();
        return $list;
    }
}