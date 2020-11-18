<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiscografiaController extends Controller
{
    public function content()
    {
        return view('discografia');
    }
}
