<?php

namespace App\Controllers;

class Pages extends BaseController
{
    protected $usersModel;
    protected $userLogin;


    public function __construct()
    {

        $this->usersModel = new \App\Models\UsersModel();

        // user
        if (session()->get("isLoggedIn")) {
            $this->userLogin = $this->usersModel->getUserByUuid(session()->get('uuid'));
        } else {
            $this->userLogin = false;
        }
    }
    public function index()
    {
        $data = [
            'tittle' => 'Home',
            'user' => $this->userLogin,
            'meta' => [
                'url' => str_replace('.php', '', current_url()),
                'desc' => "Home",
                'keyword' => str_replace(' ', ', ', 'Home | Bhadrika'),
                'author' => 'Bhadrika Aryaputra Hermawan'
            ]
        ];
        return view('pages/home', $data);
    }

    public function blog()
    {
        $data = [
            'tittle' => 'Blog',
            'activeTabs' => 'blog',
            'user' => $this->userLogin,
            'meta' => [
                'url' => str_replace('.php', '', current_url()),
                'desc' => "Blog",
                'keyword' => str_replace(' ', ', ', 'Blog | Bhadrika'),
                'author' => 'Bhadrika Aryaputra Hermawan'
            ]
        ];
        return view('pages/blog', $data);
    }

    public function about()
    {
        $data = [
            'tittle' => 'About Me',
            'activeTabs' => 'about',
            'user' => $this->userLogin,
            'meta' => [
                'url' => str_replace('.php', '', current_url()),
                'desc' => "About",
                'keyword' => str_replace(' ', ', ', 'About | Bhadrika'),
                'author' => 'Bhadrika Aryaputra Hermawan'
            ]
        ];
        return view('pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'tittle' => 'Contact',
            'activeTabs' => 'contact',
            'meta' => [
                'url' => str_replace('.php', '', current_url()),
                'desc' => "Contact",
                'keyword' => str_replace(' ', ', ', 'Contact | Bhadrika'),
                'author' => 'Bhadrika Aryaputra Hermawan'
            ],
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
            ],
            'user' => $this->userLogin
        ];

        return view('pages/contact', $data);
    }
}
