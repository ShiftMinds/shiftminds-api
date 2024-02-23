<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Simple extends Controller
{
    public function index()
    {
        $fakeData = [
            'id'=> 1,
            'name' => 'Test web',
        ];
        return response()-> json($fakeData);
    }
}