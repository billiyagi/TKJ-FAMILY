<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ProfileController extends BaseController
{
    public function index()
    {
        $data = [
            'page_title'    =>  'Profile',
            'user'          =>  $this->user_model->find(session('user_session')['id'])
        ];

        return view('member/profile/index', $data);
    }

    public function update()
    {
        // Validasi
        if(!$this->validate([
            'first_name'    =>  [
                'rules'         =>  'required|alpha_space',
                'errors'        =>  [
                    'required'      =>  'Nama depan diperlukan'
                ]
            ],
            'last_name'    =>  [
                'rules'         =>  'required|alpha_space',
                'errors'        =>  [
                    'required'      =>  'Nama belakang diperlukan'
                ]
            ],
            'email'    =>  [
                'rules'         =>  'required|valid_email|is_unique[users.email,user_id,{id}]'
            ],
            'avatar'    =>  [
                'rules'         =>  'max_size[avatar,1024]|mime_in[avatar,image/png,image/jpg,image/jpeg]|ext_in[avatar,png,jpg,jpeg]|is_image[avatar]'
            ]
        ])) {
            return $this->response->setJSON(['validation' => FALSE, $this->xss->xss_clean($this->validator->getErrors())]);
        }

        // File avatar pengguna
        $avatar_file = $this->request->getFile('avatar');

        /** 
         * Memeriksa apakah pengguna ingin mengganti avatar
        */
        if ( $avatar_file->getError() != 0 ) {
            // Avatar sebelumnya
            $avatar = $this->request->getPost('old_avatar');
        } else {
            // Avatar baru
            $avatar = $avatar_file->getRandomName();
        }

        // Data
        $data = [
            'user_id'       =>  $this->request->getPost('id'),
            'first_name'    =>  $this->xss->xss_clean($this->request->getPost('first_name')),
            'last_name'     =>  $this->xss->xss_clean($this->request->getPost('last_name')),
            'email'         =>  $this->xss->xss_clean($this->request->getPost('email')),
            'avatar'        =>  $avatar,
        ];

        // Simpan data
        if ( $this->user_model->save($data) ) {

            /** 
             * Memeriksa apakah pengguna ingin mengganti avatar
            */
            if ( $avatar_file->getError() == 0 ) {

                // Pindahkan avatar ke folder uploads
                $avatar_file->move('uploads/', $avatar);

                /** 
                 * Memeriksa apakah avatar sebelumnya adalah avatar default
                */
                if ( $this->request->getPost('old_avatar') != 'default-avatar.png' ) {
                    // Hapus avatar sebelumnya
                    unlink('uploads/'.$this->request->getPost('old_avatar'));
                }
            }
            $status = TRUE;
        } else {
            $status = FALSE;
        }

        // Buat ulang sesi login
        user_session($this->user_model->find($this->request->getPost('id')));
        return $this->response->setJSON(['validation' => $status]);  
    }
}
