<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function index()
    {
        // Mengecek apakah pengguna sudah login
        if (!session()->has('username')) {
            return redirect()->to(site_url('login'));
        }

        // Jika sudah login, tampilkan halaman dashboard
        return view('dashboard_view');
    }
}
