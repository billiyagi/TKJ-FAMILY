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

        return $this->response->setJSON(['validation' => TRUE]);
    }
}
