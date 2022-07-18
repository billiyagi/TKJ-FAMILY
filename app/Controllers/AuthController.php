<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AuthController extends BaseController
{
    public function index()
    {
        if ( !$this->validate([
            'username_in' => [
                'rules'     =>  'required',
                'errors'    =>  [
                    'required'  =>  'username diperlukan'
                ]
            ],
            'password_in' => [
                'rules'     =>  'required',
                'errors'    =>  [
                    'required'  =>  'password diperlukan'
                ]
            ]
        ]) ) {
            return $this->response->setJSON(['validation' => FALSE, $this->validator->getErrors()]);
        }

        $user = $this->user_model->where('username', $this->request->getPost('username_in'))->find();

        // Cek Autentikasi akun
        if ( !$user ) {
            return $this->response->setJSON(['validation' => TRUE, 'error' => ['Akun tidak ditemukan', '', 'error']]);

        } else {
            // Cek Password
            if ( !password_verify($this->request->getPost('password_in'), $user[0]->password) ) {
                return $this->response->setJSON(['validation' => TRUE, 'error' => ['Password salah', 'Mohon coba kembali', 'warning', $user]]);
            }
        }

        // Cek aktivasi akun
        if ( $user[0]->status_activation != 1 ) {
            return $this->response->setJSON(['validation' => TRUE, 'error' => ['Akun belum aktif', 'Tunggu beberapa saat hingga admin mengaktifkannya', 'warning', $user]]);
        }

        // But session User
        user_session($user[0]);
        return $this->response->setJSON(['validation' => TRUE]);
    }

    public function logout()
    {
        session()->remove('user_session');
        session()->destroy('user_session');
        return redirect('/');
    }
}
