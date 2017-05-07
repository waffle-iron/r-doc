<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MockupsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function guide() {
        return view('guide.index');
    }
}
