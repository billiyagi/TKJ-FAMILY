<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PostsController extends BaseController
{
    public function index()
    {
        $data = [
            'page_title'    =>  'Posts',
            'posts'         =>  '',
        ];

        return view('member/posts/index', $data);
    }
}
