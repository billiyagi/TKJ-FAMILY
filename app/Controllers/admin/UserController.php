<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class UserController extends BaseController
{
    public function index()
    {
        //
    }

    public function store()
    {

        // Validasi input
        if ( !$this->validate([
            'first_name'    =>  [
                'rules'         =>  'required|alpha_space|string',
                'errors'        =>  [
                    'required'      =>  'nama depan diperlukan'
                ]
            ],
            'last_name'    =>  [
                'rules'         =>  'required|alpha_space|string',
                'errors'        =>  [
                    'required'      =>  'nama belakang diperlukan'
                ]
            ],
            'email'    =>  [
                'rules'         =>  'required|valid_email|is_unique[users.email,user_id,{id}]',
                'errors'        =>  [
                    'required'      =>  'alamat email diperlukan'
                ]
            ],
            'username'    =>  [
                'rules'         =>  'required|string|is_unique[users.username,user_id,{id}]'
            ],
            'password'    =>  [
                'rules'         =>  'required|string'
            ],
            'whoami'    =>  [
                'rules'         =>  'required|string',
                'errors'        =>  [
                    'required'      =>  'mohon ceritakan sedikit tentang anda, untuk verifikasi data'
                ]
            ]
        ]) ) {
            return $this->response->setJSON(['validation' => FALSE, $this->validator->getErrors()]);
        }


        // Siapkan data yang akan disimpan
        $data = [
            'first_name'            =>  $this->xss->xss_clean($this->request->getPost('first_name')),
            'last_name'             =>  $this->xss->xss_clean($this->request->getPost('last_name')),
            'email'                 =>  $this->xss->xss_clean($this->request->getPost('email')),
            'username'              =>  $this->xss->xss_clean($this->request->getPost('username')),
            'password'              =>  password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'avatar'                =>  'default-avatar.png',
            'user_whoami'           =>  $this->xss->xss_clean($this->request->getPost('whoami')),
            'status_activation'     =>  0,
            'role_id'               =>  2,
            'last_login'            =>  NULL
        ];

        /** 
         * *Simpan dan kembalikan nilai
         * TRUE: Menyimpan data ke database berhasil
         * FALSE: Menyimpan data ke database gagal
        */
        $status = ($this->user_model->save($data)) ? TRUE : FALSE;
        return $this->response->setJSON(['validation' => $status]);
    }

    public function show_ajax($id)
    {
        return $this->response->setJSON($this->user_model->find($id));
    }
}
