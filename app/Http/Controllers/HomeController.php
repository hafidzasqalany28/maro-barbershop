<?php

namespace App\Http\Controllers;

use App\Models\Kapster;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', [
            'services' => Service::all(),
        ]);
    }

    public function services()
    {
        return view('services', [
            'services' => Service::all(),
        ]);
    }

    public function about()
    {
        return view('about', [
            'kapsters' => Kapster::all(),
        ]);
    }
}
