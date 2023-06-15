<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth/register');
    }

    public function store()
    {
        $model = new UserModel();

        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $model->save([
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => md5($this->request->getPost('password'))
        ]);

        return redirect()->to('/login')->with('message', 'Registrasi berhasil. Silakan login.');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function authenticate()
    {
        $model = new UserModel();

        $validation = \Config\Services::validation();
        $validation->setRules([
            'email' => 'required|valid_email',
            'password' => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $remember = $this->request->getPost('remember');

        $user = $model->where('email', $email)->first();

        if ($user === null || md5($password) != $user['password']) {
            return redirect()->back()->withInput()->with('error', 'Email atau password salah.');
        }

        // Simpan data pengguna ke sesi
        $session = session();
        $session->set('user', $user);

        return redirect()->to('/');
    }

    public function logout()
    {
        // Hapus data pengguna dari sesi
        $session = session();
        $session->remove('user');

        return redirect()->to('/login');
    }
}
