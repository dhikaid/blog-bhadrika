<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Blogs extends BaseController
{
    protected $usersModel;
    protected $blogsModel;

    public function __construct()
    {
        $this->usersModel = new \App\Models\UsersModel();
        $this->blogsModel = new \App\Models\BlogsModel();
    }

    public function create()
    {

        $data = [
            'tittle' => 'Create Blog',
            'activeTabs' => 'blogs',
            'user' => $this->usersModel->getUserByUuid(session()->get('uuid')),
            'validation' => session()->getFlashdata('validation'),
        ];
        return view('admin/dashboard/blogs/createBlogs', $data);
    }

    public function edit($slug)
    {
        $blog = $this->blogsModel->getBlogs($slug);
        $data = [
            'tittle' => 'Edit Blog',
            'activeTabs' => 'blog',
            'validation' => session()->getFlashdata('validation'),
            'user' => $this->usersModel->getUserByUuid(session()->get('uuid')),
            'blog' => $blog,
        ];
        if (session()->get('isLoggedIn') && session()->get("uuid") === $blog['penulis']) {
            return view('admin/dashboard/blogs/editBlogs', $data);
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
            return redirect()->to(base_url() . 'dashboard/blogs/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $this->validator->getErrors());
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
            $fileGambar->move('img/cover', $namaGambar);
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

        session()->setFlashdata('pesan', 'Blogs: ' . $this->request->getVar('judul') . ' berhasil diubah');

        return redirect()->to(base_url() . 'dashboard/blogs');
    }

    public function save()
    {
        // dd($this->request->getFile('gambar'));
        helper(['form']);
        // validasi
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[blogs.judul]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah ada'
                ]
            ],
            'gambar' => [
                'rules' => 'uploaded[gambar]|max_size[gambar,10240]|mime_in[gambar,image/png,image/jpeg]|is_image[gambar]',
                'errors' => [
                    'uploaded' => '{field} harus diisi',
                    'max_size' => 'ukuran > 10Mb',
                    'is_image' => 'file bukan gambar',
                    'mime_in' => 'file bukan gambar',
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url() . 'dashboard/blogs/create')->withInput()->with('validation', $this->validator->getErrors());
            // $this->errorMessage = $this->validator->getError('gambar');
            // dd($this->errorMessage);
            // return redirect()->back()->withInput();
        }

        // ambil gambar
        $fileGambar = $this->request->getFile('gambar');
        // generate nama gambar
        $namaGambar = $fileGambar->getRandomName();
        // pindahkan file
        $fileGambar->move('img/cover', $namaGambar);
        // // ambil nama file
        // $namaGambar = $fileGambar->getName();

        // ambil get dan post
        $slug = url_title($this->request->getVar("judul"), '-', true);

        // penulis 
        $penulis = $this->request->getVar("penulis");
        $penulis = $this->usersModel->getUserByUuid($this->request->getVar("creator"));
        $this->blogsModel->save([
            'judul' => $this->request->getVar("judul"),
            'slug' => $slug,
            'penulis' => $penulis['uuid'],
            'gambar' => $namaGambar,
            'text' => $this->request->getVar("text"),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to(base_url() . 'dashboard/blogs');
    }

    public function delete($id)
    {

        // cari gambar berdasarkan id
        $blog = $this->blogsModel->find($id);
        // hapus gambar
        // unlink('img/' . $blog['gambar']);
        if (session()->get('isLoggedIn') && session()->get("uuid") === $blog['penulis']) {
            $this->blogsModel->delete($id);
            session()->setFlashdata('pesan', 'Blogs: ' . $blog['judul'] . ' Data berhasil dihapus');
            return redirect()->to(base_url() . 'dashboard/blogs');
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Tidak ada hak untuk mengedit blog "' . $blog['judul'] . '"');
        }
    }
}
