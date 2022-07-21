<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PostController extends BaseController
{
    public function index()
    {
        if ( empty($this->request->getGet('q')) ) {
            $data_posts = $this->post_model->orderBy('post_id', 'DESC')->join('categories', 'categories.category_id = posts.category_id')->join('users', 'users.user_id = posts.user_id')->paginate(5);
        } else {
            $data_posts = $this->post_model->like('title', $this->request->getGet('q'), 'both')->orderBy('post_id', 'DESC')->join('categories', 'categories.category_id = posts.category_id')->join('users', 'users.user_id = posts.user_id')->paginate(5);
        }

        $data = [
            'page_title'    =>  'Posts',
            'posts'         =>  $data_posts,
            'posts_pager'   =>  $this->post_model->pager,
            'current_pager' =>  (empty($this->request->getGet('page'))) ? 1 : $this->request->getGet('page') * 5 - 5 + 1,
            'time'          =>  $this->time
        ];

        return view('member/post/index', $data);
    }

    public function create()
    {
        $data = [
            'page_title'    =>  'Category',
            'categories'    =>  $this->category_model->orderBy('category_id', "DESC")->findAll(),
        ];

        return view('member/post/create', $data);
    }
}
