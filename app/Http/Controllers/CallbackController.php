<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CallbackController extends Controller
{
    //

    public function index(Request $request)
    {
        var_dump($request->request->all());
    }
}
