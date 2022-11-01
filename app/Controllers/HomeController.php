<?php

namespace App\Controllers;


use App\Controllers\BaseController;
use App\Models\MovimentsModel;

class HomeController extends BaseController
{
    public function index()
    {
        $movModel = new MovimentsModel();
        $list=$movModel->list();
        $data['list'] = $list;
        $listMovi=$movModel->listMovi();
        $data['listMovi'] = $listMovi;
        $input=$movModel->input();
        $data['input'] = $input;
        $inputAll=$movModel->inputAll();
        $data['inputAll'] = $inputAll;
        $output=$movModel->output();
        $data['output'] = $output;
        $outputAll=$movModel->outputAll();
        $data['outputAll'] = $outputAll;
        $cash_balance=$movModel->cash_balance();
        $data['cash_balance'] = $cash_balance;
        return view('home', $data);
    }
}