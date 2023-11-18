<?php

namespace App\Controllers;

use PDO;

class Blogs extends BaseController
{
    protected $usersModel;
    protected $blogsModel;
    protected $commentsModel;
    protected $errorMessage = null;

    public function __construct()
    {
        // model
        $this->blogsModel = new \App\Models\BlogsModel();
        // model
        $this->usersModel = new \App\Models\UsersModel();
        $this->commentsModel = new \App\Models\CommentsModel();

        // text
        helper('text');
    }


    public function index(): string
    {
        // $blogs = $this->blogsModel->getBlogs();

        // kwyword
        $keyword = $this->request->getVar('keyword');
        if (isset($keyword)) {
            $blogs = $this->blogsModel->search($keyword);
        } else {
            $blogs = $this->blogsModel;
        }
        // dd(count($blogs->paginate(6, 'blogs')));

        $data = [
            'tittle' => 'Blog',
            'activeTabs' => 'blog',
            'blogs' => $blogs->paginate(6, 'blogs'),
            'pager' => $this->blogsModel->pager,

        ];


        return view('blogs/index', $data);
    }

    public function detail($slug)
    {
        $blogs = $this->blogsModel->getBlogs($slug);

        if (empty($blogs)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul Blog "' . $slug . '" tidak ditemukan');
        }

        $author = $this->usersModel->getAuthorByUuid($blogs['penulis']);
        $comment = $this->commentsModel->getBlogComment($blogs['id']);
        if (session()->get("isLoggedIn")) {
            $user = $this->usersModel->getUserByUuid(session()->get("uuid"));
            $userUUID = [
                "gambar" => $user['gambar'],
                "uuid" => $user['uuid'],
                "fullname" => $user['fullname'],
            ];
        } else {
            $userUUID = false;
        }

        $data = [
            'tittle' => $blogs['judul'],
            'blog' => $blogs,
            'userUUID' => $userUUID,
            'author' => $author,
            'activeTabs' => 'blog',
            'validation' => session()->getFlashdata('validation'),
            'comments' => $comment,
        ];

        // jika tidak ada komik


        return view('blogs/detail', $data);
    }

    // public function create()
    // {

    //     $data = [
    //         'tittle' => 'Create Blog',
    //         'activeTabs' => 'blog',
    //         'validation' => session()->getFlashdata('validation'),
    //     ];
    //     return view('blogs/create', $data);
    // }

    // public function save()
    // {
    //     // dd($this->request->getFile('gambar'));
    //     helper(['form']);
    //     // validasi
    //     if (!$this->validate([
    //         'judul' => [
    //             'rules' => 'required|is_unique[blogs.judul]',
    //             'errors' => [
    //                 'required' => '{field} harus diisi',
    //                 'is_unique' => '{field} sudah ada'
    //             ]
    //         ],
    //         'gambar' => [
    //             'rules' => 'uploaded[gambar]|max_size[gambar,10240]|mime_in[gambar,image/png,image/jpeg]|is_image[gambar]',
    //             'errors' => [
    //                 'uploaded' => '{field} harus diisi',
    //                 'max_size' => 'ukuran > 10Mb',
    //                 'is_image' => 'file bukan gambar',
    //                 'mime_in' => 'file bukan gambar',
    //             ]
    //         ],
    //     ])) {
    //         $validation = \Config\Services::validation();
    //         return redirect()->to(base_url() . 'blogs/create')->withInput()->with('validation', $this->validator->getErrors());
    //         // $this->errorMessage = $this->validator->getError('gambar');
    //         // dd($this->errorMessage);
    //         // return redirect()->back()->withInput();
    //     }

    //     // ambil gambar
    //     $fileGambar = $this->request->getFile('gambar');
    //     // generate nama gambar
    //     $namaGambar = $fileGambar->getRandomName();
    //     // pindahkan file
    //     $fileGambar->move('img', $namaGambar);
    //     // // ambil nama file
    //     // $namaGambar = $fileGambar->getName();

    //     // ambil get dan post
    //     $slug = url_title($this->request->getVar("judul"), '-', true);
    //     $this->blogsModel->save([
    //         'judul' => $this->request->getVar("judul"),
    //         'slug' => $slug,
    //         'penulis' => $this->request->getVar("penulis"),
    //         'gambar' => $namaGambar,
    //         'text' => $this->request->getVar("text"),
    //     ]);

    //     session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

    //     return redirect()->to(base_url() . 'blogs');
    // }


    public function delete($id)
    {

        // cari gambar berdasarkan id
        $blog = $this->blogsModel->find($id);
        // hapus gambar
        // unlink('img/' . $blog['gambar']);
        if (session()->get('isLoggedIn') && session()->get("uuid") === $blog['penulis']) {
            $this->blogsModel->delete($id);
            session()->setFlashdata('pesan', 'Data berhasil dihapus');
            return redirect()->to(base_url() . 'blogs');
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Tidak ada hak untuk mengedit blog "' . $blog['judul'] . '"');
        }
    }

    public function edit($slug)
    {
        $blog = $this->blogsModel->getBlogs($slug);
        $data = [
            'tittle' => 'Edit Blog',
            'activeTabs' => 'blog',
            'validation' => session()->getFlashdata('validation'),
            'blog' => $blog,
        ];
        if (session()->get('isLoggedIn') && session()->get("uuid") === $blog['penulis']) {
            return view('blogs/edit', $data);
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Tidak ada hak untuk mengedit blog "' . $slug . '"');
        }
    }

    public function update($id)
    {
        // dicek
        $blogsLama = $this->blogsModel->getBlogs($this->request->getVar("slug"));
        if ($blogsLama['judul'] == $this->request->getVar('judul')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[blogs.judul]';
        }
        // validasi
        if (!$this->validate([
            'judul' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah ada'
                ]
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,10240]|mime_in[gambar,image/png,image/jpeg]|is_image[gambar]',
                'errors' => [
                    'max_size' => 'ukuran > 10Mb',
                    'is_image' => 'file bukan gambar',
                    'mime_in' => 'file bukan gambar',
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url() . 'blogs/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $this->validator->getErrors());
            // $validation = \Config\Services::validation();
            // return redirect()->to(base_url() . 'blogs/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        }

        $fileGambar = $this->request->getFile('gambar');

        // cek gambar apakah gambar lama atau berubah
        if ($fileGambar->getError() == 4) {
            $namaGambar = $this->request->getVar('gambarLama');
        } else {
            // jika upload
            $namaGambar = $fileGambar->getRandomName();
            // upload gambar
            $fileGambar->move('img', $namaGambar);
            // unlink
            // unlink('img/' . $this->request->getVar('gambarLama'));
        }

        $slug = url_title($this->request->getVar("judul"), '-', true);
        $this->blogsModel->save([
            'id' => $id,
            'judul' => $this->request->getVar("judul"),
            'slug' => $slug,
            'penulis' => $this->request->getVar("penulis"),
            'gambar' => $namaGambar,
            'text' => $this->request->getVar("text"),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');

        return redirect()->to(base_url() . 'blogs');
    }

    public function comments($slug)
    {
        helper('form');
        if (!$this->validate([
            'comment' => [
                'rules' => "required|max_length[256]",
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah ada'
                ]
            ],

        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url() . 'blogs/' . $slug)->withInput()->with('validation', $this->validator->getErrors());
            // $validation = \Config\Services::validation();
            // return redirect()->to(base_url() . 'blogs/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        }


        $blog = $this->blogsModel->getBlogs($slug);

        $this->commentsModel->save([
            "comments" => esc($this->request->getVar("comment")),
            "userid" => session()->get('uuid'),
            "blogid" => $blog['id']
        ]);

        return redirect()->to(base_url('blogs/' . $slug));
    }
}
