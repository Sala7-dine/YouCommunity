<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        return view("Event/detaile");

    }

    public function dashboard(){

        return view("dashboard/index");

    }
}
