<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogsModel extends Model
{
    protected $table = 'blogs';
    protected $useTimestamps = true;
    protected $allowedFields = ['judul', 'slug', 'penulis', 'text', 'gambar'];

    public function getBlogs($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        } else {
            return $this->where(['slug' => $slug])->first();
        }
    }

    public function getLastBlog()
    {
        return $this->orderBy('created_at', 'DESC')->findAll();
    }


    public function getLastBlogByUUID($uuid)
    {
        return $this->where(['penulis' => $uuid])->orderBy('created_at', 'DESC')->findAll();
    }

    public function search($keyword)
    {
        // $builder = $this->table('blogs');
        // $builder->like('judul', $keyword);
        return $this->like('judul', $keyword);
    }
}
