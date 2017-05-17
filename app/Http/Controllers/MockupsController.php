<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function redirect;

class MockupsController extends Controller
{
    public function __construct()
    {
        //
    }

    public function guide($guideid) {
      if(!$guideid) {
        return view('guide.index');
      } else {
        return redirect()->guest('/login');
      }
    }

    public function edit() {
      return view('guide.edit-introduction');
    }

    public function editSteps() {
      return view('guide.edit-steps');
    }
}
