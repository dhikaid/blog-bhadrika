<?php

namespace App\Controllers;

class Home extends BaseController
{

    public function index(): string
    {
        $data = [
            'tittle' => 'Home',
            'activeTabs' => 'home',
        ];
        return view('home/index', $data);
    }
}
