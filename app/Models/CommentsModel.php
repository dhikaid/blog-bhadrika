<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentsModel extends Model
{
    protected $table = 'comments';
    protected $useTimestamps = true;
    protected $allowedFields = ['comments', 'blogid', 'userid'];



    public function getBlogComment($id)
    {
        return $this->select("comments, gambar, fullname, userid")->join('users', 'users.uuid = comments.userid')->where(['blogid' => $id])->findAll();
    }
}
