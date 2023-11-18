<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{

    protected $usersModel;
    protected $blogsModel;

    public function __construct()
    {
        $this->usersModel = new \App\Models\UsersModel();
        $this->blogsModel = new \App\Models\BlogsModel();
    }

    public function index(): string
    {
        $data = [
            'tittle' => 'Dashboard',
            'activeTabs' => 'home',
            'user' => $this->usersModel->getUserByUuid(session()->get('uuid')),
            'validation' => session()->getFlashdata('validation'),

        ];
        return view('admin/dashboard/index', $data);
    }

    public function blogs()
    {
        $user = $this->usersModel->getUserByUuid(session()->get('uuid'));
        $data = [
            'tittle' => 'Blogs',
            'activeTabs' => 'blogs',
            'user' => $user,
            'blogs' => $this->blogsModel->getLastBlogByUUID($user['uuid']),
        ];
        return view('admin/dashboard/blogs', $data);
    }
}
