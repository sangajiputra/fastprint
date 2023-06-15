<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class NoAuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Cek apakah pengguna sudah terotentikasi
        $isLoggedIn = session()->get('isLoggedIn');

        if ($isLoggedIn) {
            // Jika pengguna sudah terotentikasi, redirect ke halaman lain (misalnya dashboard)
            return redirect()->to('/dashboard');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // ...
    }
}
