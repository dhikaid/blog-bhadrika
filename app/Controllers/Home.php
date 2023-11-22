<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $usersModel;
    protected $userLogin;


    public function __construct()
    {

        // model
        $this->usersModel = new \App\Models\UsersModel();
        // user
        if (session()->get("isLoggedIn")) {
            $this->userLogin = $this->usersModel->getUserByUuid(session()->get('uuid'));
        } else {
            $this->userLogin = false;
        }
    }
    public function index(): string
    {
        $data = [
            'tittle' => 'Home',
            'activeTabs' => 'home',
            'user' => $this->userLogin,
            'meta' => [
                'url' => str_replace('.php', '', current_url()),
                'desc' => "Home",
                'keyword' => str_replace(' ', ', ', 'Home | Bhadrika'),
                'author' => 'Bhadrika Aryaputra Hermawan'
            ]
        ];
        return view('home/index', $data);
    }
}
