<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'users';  // Sesuaikan dengan nama tabel pengguna di database
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password'];

    public function validateUser($username, $password)
    {
        // Memeriksa apakah ada pengguna dengan username dan password yang sesuai
        $query = $this->where('username', $username)
                      ->where('password', md5($password))  // Menggunakan md5 untuk hash password
                      ->first();

        return $query ? true : false;
    }
}
