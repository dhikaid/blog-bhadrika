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
        header("Content-Type: text/xml; charset=UTF-8");
        return $this->response->setXML(view('sitemap', $data));
    }
}
