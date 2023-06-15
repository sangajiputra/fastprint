<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $model = new ProductModel();
        $data['products'] = $model->where('status', 'bisa dijual')->findAll();

        return view('products/index', $data);
    }

    public function create()
    {
        return view('products/create');
    }

    public function store()
    {
        $model = new ProductModel();

        $validation =  \Config\Services::validation();
        $validation->setRules([
            'no_produk' => 'required|numeric',
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'status' => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $model->save([
            'id_produk' => $this->request->getPost('no_produk'),
            'nama_produk' => $this->request->getPost('nama_produk'),
            'harga' => $this->request->getPost('harga'),
            'kategori' => $this->request->getPost('kategori'),
            'status' => $this->request->getPost('status')
        ]);

        return redirect()->to('product')->with('message', 'Produk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $model = new ProductModel();
        $data['product'] = $model->find($id);

        return view('products/edit', $data);
    }

    public function update($id)
    {
        $model = new ProductModel();

        $validation =  \Config\Services::validation();
        $validation->setRules([
            'no_produk' => 'required|numeric',
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'status' => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $model->update($id, [
            'id_produk' => $this->request->getPost('no_produk'),
            'nama_produk' => $this->request->getPost('nama_produk'),
            'harga' => $this->request->getPost('harga'),
            'kategori' => $this->request->getPost('kategori'),
            'status' => $this->request->getPost('status')
        ]);

        return redirect()->to('product')->with('message', 'Produk berhasil diperbarui.');
    }

    public function delete($id)
    {
        $model = new ProductModel();
        $model->delete($id);

        return redirect()->to('/')->with('message', 'Produk berhasil dihapus.');
    }
}