<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        return view('member/dashboard/index', ['page_title' => 'Dashboard']);
    }
}
