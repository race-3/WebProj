<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function index() {
        return view('pages.home');
    }

    public function page1() {
        // api key and stuff

        return view('pages.page1');
    }

    public function page2() {
        return view('pages.page2');
    }

    public function page3() {
        return view('pages.page3');
    }
}
