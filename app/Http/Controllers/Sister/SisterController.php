<?php

namespace App\Http\Controllers\Sister;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SisterController extends Controller
{
    public function index() {
        return view('Sister.dashboard');
    }

}
