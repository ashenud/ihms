<?php

namespace App\Http\Controllers\Midwife;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MidwifeController extends Controller
{
    public function index() {
        return view('Midwife.dashboard');
    }
}
