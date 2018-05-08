<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaracastsController extends Controller
{
    public function index() {
        return view('welcome');
    }
}
