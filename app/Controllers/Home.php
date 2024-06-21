<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Home extends BaseController
{
    public function index(){
        echo view('_partials/header');
        echo view('_partials/navbar');
        echo view('home/index.php');
        echo view('_partials/footer');
    }
}
