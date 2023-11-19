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
        ];
        return view('home/index', $data);
    }
}
