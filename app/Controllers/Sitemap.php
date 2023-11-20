<?php

namespace App\Controllers;

class Sitemap extends BaseController
{
    protected $blogsModel;

    public function __construct()
    {
        $this->blogsModel = new \App\Models\BlogsModel();
    }
    public function index()
    {
        $data = [
            "blogs" => $this->blogsModel->getLastBlog(),
        ];
        return $this->response->setXML(view('sitemap', $data));
    }
}
