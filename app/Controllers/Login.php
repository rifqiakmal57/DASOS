<?php

namespace App\Controllers;

use App\Models\LoginModel;
use CodeIgniter\Controller;

class Login extends Controller
{
    public function index()
    {
        return view('login_view');
    }

    public function authenticate()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        
        // Memanggil model untuk validasi login
        $loginModel = new LoginModel();
        $result = $loginModel->validateUser($username, $password);

        if ($result) {
            // Simpan data user yang sudah login (misalnya menggunakan session)
            session()->set('username', $username); // Menyimpan username ke session

            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Login successful',
                'redirect_url' => site_url('dashboard')  // Redirect ke halaman dashboard
            ]);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid username or password']);
        }
    }

    public function logout()
    {
        // Hapus session saat logout
        session()->destroy();
        return redirect()->to(site_url('login'));
    }
}
