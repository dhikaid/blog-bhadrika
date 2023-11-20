<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Users extends BaseController
{

    protected $usersModel;

    public function __construct()
    {
        $this->usersModel = new \App\Models\UsersModel();
    }



    public function save()
    {
        // dd($this->request->getFile('uploadGambar'));
        helper(['form']);

        if ($this->request->getVar('password1')) {
            $rulePass = "required|min_length[3]|";
            $passwordis = true;
        } else {
            $rulePass = '';
            $passwordis = false;
        }
        // validasi
        if (!$this->validate([
            '_uuid' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'fullname' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'username' => [
                'rules' => 'trim|required|min_length[5]|max_length[12]|alpha_numeric|is_unique[users.username]',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|trim',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'valid_email' => '{field} harus email',
                ]
            ],
            'password1' => [
                'rules' => $rulePass . 'trim|matches[password2]',
                'errors' => [
                    'matches' => "The password dont match.",
                ]
            ],
            'password2' => [
                'rules' => $rulePass . 'trim|matches[password1]',
                'errors' => [
                    'matches' => "The password dont match.",
                ]
            ],
            'uploadGambar' => [
                'rules' => 'max_size[uploadGambar,10240]|mime_in[uploadGambar,image/png,image/jpeg]|is_image[uploadGambar]',
                'errors' => [
                    'max_size' => 'ukuran > 10Mb',
                    'is_image' => 'file bukan gambar',
                    'mime_in' => 'file bukan gambar',
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            // dd("hai");
            return redirect()->to(base_url() . 'dashboard')->withInput()->with('validation', $this->validator->getErrors());
            // $this->errorMessage = $this->validator->getError('gambar');
            // dd($this->errorMessage);
            // return redirect()->back()->withInput();
        }

        // ambil gambar

        // dd($this->request->getFile('uploadGambar'));
        $users = $this->usersModel->getUserByUuid($this->request->getVar('_uuid'));
        $fileGambar = $this->request->getFile('uploadGambar');
        if ($fileGambar->getError() == 4) {
            $namaGambar = $users['gambar'];
        } else {
            // jika upload
            $namaGambar = $fileGambar->getRandomName();
            // upload gambar
            $fileGambar->move('img/avatar', $namaGambar);
            // unlink
            // unlink('img/' . $this->request->getVar('gambarLama'));
        }

        if ($passwordis) {
            $password = password_hash($this->request->getVar('password1'), PASSWORD_DEFAULT);
        } else {
            $password = $users['password'];
        }

        $username = $this->request->getVar('username');
        $username = str_replace(' ', '_', $username);

        $this->usersModel->save([
            'id' => $users['id'],
            'uuid' => $users['uuid'],
            'username' => esc($username),
            'email' => esc($this->request->getVar('email')),
            'fullname' => esc($this->request->getVar('fullname')),
            'password' => $password,
            'gambar' => $namaGambar,
            'role_id' => $users['role_id'],
        ]);


        session()->setFlashdata('pesan', 'Data berhasil disimpan');

        return redirect()->to(base_url() . 'dashboard');
    }
}
