<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MovimentsModel;


class MovimentsController extends BaseController
{
    public function index()
    {
        /*$movModel = new MovimentsModel();
        $data['moviments'] = $movModel->findAll();*/
        $movModel = new MovimentsModel();
        $list = $movModel->listMovi();
        $data['moviments'] = $list;
        $cash_balance = $movModel->cash_balance();
        $data['cash_balance'] = $cash_balance;
        return view('moviments/index', $data);
    }

    public function MovimentsPdf()
    {
        $movModel = new MovimentsModel();
        $list = $movModel->listMovi();
        $data['moviments'] = $list;
        $cash_balance = $movModel->cash_balance();
        $data['cash_balance'] = $cash_balance;
        $input = $movModel->input();
        $data['input'] = $input;
        $output = $movModel->output();
        $data['output'] = $output;
        return view('pdf', $data);
    }


    public function filtrar()
    {
        $movModel = new MovimentsModel();

        $list = $movModel->listFilrada();

        $data['moviments'] = $list;
        $cash_balance = $movModel->cash_balance();
        $data['cash_balance'] = $cash_balance;
        return view('moviments/index', $data);
    }
}
