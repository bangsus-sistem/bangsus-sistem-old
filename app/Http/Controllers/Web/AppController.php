<?php

namespace App\Http\Controllers\Web;

use App\Foundation\Http\Controller;

class AppController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app', [
            'version' => [
                'app' => config('app.version'),
                'laravel' => \Illuminate\Foundation\Application::VERSION,
                'php' => PHP_VERSION,
            ]
        ]);
    }
}
