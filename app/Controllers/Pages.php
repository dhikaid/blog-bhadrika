<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'tittle' => 'Home',
        ];
        return view('pages/home', $data);
    }

    public function blog()
    {
        $data = [
            'tittle' => 'Blog',
            'activeTabs' => 'blog',

        ];
        return view('pages/blog', $data);
    }

    public function about()
    {
        $data = [
            'tittle' => 'About Me',
            'activeTabs' => 'about',

        ];
        return view('pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'tittle' => 'Contact',
            'activeTabs' => 'contact',
            'alamat' => [
                [
                    'tipe' => 'rumah',
                    'alamat' => 'jl. abc no 123',
                    'kota' => 'Bandung',
                ],
                [
                    'tipe' => 'kantor',
                    'alamat' => 'jl. dbc no 123',
                    'kota' => 'Bandung',
                ]
            ]
        ];

        return view('pages/contact', $data);
    }
}
