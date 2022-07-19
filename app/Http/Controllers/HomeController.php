<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return redirect()->route('home');
    }
    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function home()
    {
        return view('home');
    }

    public function admin()
    {
        return view('admin');
    }
}
