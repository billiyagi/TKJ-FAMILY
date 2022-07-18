<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index()
    {
        $data = [
            'title_page'    =>  'TKJ FAMILY - Angkatan 11'
        ];

        return view('home/index', $data);
    }
}
