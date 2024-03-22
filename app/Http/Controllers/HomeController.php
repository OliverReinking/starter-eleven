<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    //
    public function home_index()
    {
        //
        $success = 'Herzlichen Willkommen im Laravel-Template Starter Eleven';
        Session::flash('toast.info', $success);
        //
        return Inertia::render('Homepage/Home');
    }
    //
    public function home_get_started()
    {
        return Inertia::render('Homepage/GetStarted');
    }
    //
    public function home_pricing()
    {
        return Inertia::render('Homepage/Pricing');
    }
    //
    public function home_imprint()
    {
        return Inertia::render('Homepage/Imprint');
    }
    //
    public function home_privacy()
    {
        return Inertia::render('Homepage/Privacy');
    }


}
