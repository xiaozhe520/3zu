<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

class AdminController extends Controller
{
   public function index()
   {
      return view('admin/index');
   }

    public function main()
    {
        return view('admin/main');
    }

    public function menu()
    {
        return view('admin/menu');
    }

    public function top()
    {
        return view('admin/top');
    }
    public function drag()
    {
        return view('admin/drag');
    }

}