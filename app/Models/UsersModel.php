<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $useTimestamps = true;
    protected $allowedFields = ['uuid', 'username', 'email', 'fullname', 'password', 'gambar', 'role_id'];



    public function getUserByUsername($username)
    {
        return $this->where(['username' => $username])->first();
    }
    public function getUserByUuid($uuid)
    {
        return $this->where(['uuid' => $uuid])->first();
    }
    public function getAuthorByUuid($uuid)
    {
        return $this->select("fullname, username, gambar")->where(['uuid' => $uuid])->first();
    }
}
