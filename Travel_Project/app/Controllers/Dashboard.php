<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {

        echo view('Admin/header');
        echo view('Admin/dashboard');
        echo view('Admin/footer');
    }
}