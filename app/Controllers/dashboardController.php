<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;

class dashboardController extends Controller
{
    public function index()
    {
        helper(['form']);
        echo view ('dashboard/home');
    }
}