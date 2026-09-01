<?php

namespace App\Controllers;

class LoginRedirect extends BaseController
{
    public function index()
    {
        if (in_groups('superadmin')) {
            return redirect()->to('/dashboard');
        }

        if (in_groups('guru')) {
            return redirect()->to('/dashboard');
        }

        if (in_groups('siswa')) {
            return redirect()->to('/dashboard');
        }

        return redirect()->to('/login');
    }
}