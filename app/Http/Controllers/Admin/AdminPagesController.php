<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPagesController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function classes()
    {
    }
    public function subjects()
    {
    }
}
