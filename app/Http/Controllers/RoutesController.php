<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class RoutesController extends Controller
{
    public function services()
    {
        return view('services');
    }

    public function first_timer()
    {
        return view('firstimer');
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
}
