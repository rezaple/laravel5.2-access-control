<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        //$role = Auth::user()->roles()->first();
        //return $role->name;
        //return Auth::user()->hasRole('admin');
        /*$user = Auth::user();
        //return $user;
        // Jadikan user ini sebagai admin
        if (Auth::user()->hasRole('admin'))
        {
            return "Hai Admin";
        }*/
        return view('admin');
    }
}
