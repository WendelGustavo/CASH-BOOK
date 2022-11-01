<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

use function PHPUnit\Framework\returnSelf;

class User extends BaseController
{
    public function index()
    {
        return view('em_construcao');
    }


    public function login()
    {
        echo view('user/login');

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();

        $user = $userModel->asArray()->where('email', $email)->first();


        if (isset($user)) {

            $senha = md5($password);
            
            if ($user['password'] == $senha) {
                print_r($user);
                session()->set('user', $user);
                // $_SESSION['user'] = $user;
                return redirect()->to(base_url());
            } else {
                var_dump($user);
                $_SESSION['msgs'][] = [
                    'class' => 'danger',
                    'msg' => 'Conta não encontrada'
                ];
            }
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('user/login'));
    }
}
