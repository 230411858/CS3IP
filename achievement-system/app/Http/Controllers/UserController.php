<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    function isAdmin()
    {
        return strcmp(Auth::user()->type, 'admin');
    }
}
