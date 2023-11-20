<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Admin extends BaseController
{

    protected $usersModel;

    public function __construct()
    {

        $this->usersModel = new \App\Models\UsersModel();
    }

    public function index(): string
    {

        $data = [
            'tittle' => 'Home',
            'activeTabs' => 'home',
        ];
        return view('home/index', $data);
    }


    public function login(): string
    {

        $data = [
            'tittle' => 'Login',
            'activeTabs' => 'home',
            'validation' => session()->getFlashdata('login'),
        ];
        return view('admin/login', $data);
    }

    public function signin()
    {
        helper(['form']);
        if (!$this->validate([
            'username' => 'trim|required|min_length[5]|max_length[12]|alpha_numeric',
            'password' => [
                'rules' => 'required|trim',
                'errors' => [
                    'matches' => "The password dont match.",
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url() . 'admin/login')->withInput()->with('login', $this->validator->getErrors());
        }

        $username = esc($this->request->getVar('username'));
        $password = $this->request->getVar('password');

        $user = $this->usersModel->getUserByUsername($username);
        if (isset($user) && $user !== NULL) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'uuid' => $user['uuid'],
                    'role_id' => $user['role_id'],
                    'isLoggedIn' => TRUE
                ];
                session()->set($data);
                if ($user['role_id'] === "1") {
                    return redirect()->to(base_url('dashboard'));
                } else {
                    return redirect()->to(base_url('dashboard'));
                }
            } else {
                session()->setFlashdata('loginError', 'wrong password');
                return redirect()->to(base_url() . 'admin/login');
            }
        } else {
            session()->setFlashdata('loginError', $username . ' is not registered');
            return redirect()->to(base_url() . 'admin/login');
        }
    }

    public function registration()
    {
        $data = [
            'tittle' => 'Registration',
            'activeTabs' => 'home',
            'validation' => session()->getFlashdata('registration'),

        ];
        return view('admin/registration', $data);
    }

    public function register()
    {
        // echo "hgai";
        $faker = \Faker\Factory::create();

        helper(['form']);
        if (!$this->validate([
            'fullname' => 'required',
            'username' => 'trim|required|min_length[5]|max_length[12]|alpha_numeric|is_unique[users.username]',
            'email' => 'required|valid_email|trim',
            'password1' => [
                'rules' => 'required|trim|min_length[3]|matches[password2]',
                'errors' => [
                    'matches' => "The password dont match.",
                ]
            ],
            'password2' => [
                'rules' => 'required|trim|min_length[3]|matches[password1]',
                'errors' => [
                    'matches' => "The password dont match.",
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url() . 'admin/registration')->withInput()->with('registration', $this->validator->getErrors());
        }

        $this->usersModel->save([
            'uuid' => $faker->uuid(),
            'username' => esc($this->request->getVar('username')),
            'email' => esc($this->request->getVar('email')),
            'fullname' => esc($this->request->getVar('fullname')),
            'password' => password_hash($this->request->getVar('password1'), PASSWORD_DEFAULT),
            'gambar' => 'default.png',
            'role_id' => 2,
        ]);
        session()->setFlashdata('registration', 'please log in with your account');
        return redirect()->to(base_url() . 'admin/login');
    }



    public function logout()
    {
        // session()->remove('email');
        if (session()->get('uuid') !== NULL) {
            session()->remove('uuid');
            session()->remove('role_id');
            session()->remove('isLoggedIn');
            session()->setFlashdata('registration', 'you have been logged out');
        }
        return redirect()->to(base_url() . 'admin/login');
    }
}
