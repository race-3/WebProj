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

    public function environment() {
        return view('pages.environment');
    }

    public function page2() {
        $api_key = "br3gesfrh5rai6tghlig";
        return view('pages.page2', compact("api_key"));
    }

    public function page3() {
        return view('pages.page3');
    }
}
