<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\User;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class LoginController extends BaseController
{
    public function index()
    {
        $data = [
            'validation' => Services::validation(),
        ];
        return view('auth/login', $data);
    }

    public function loginAction()
    {
        // Validasi input
        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;

            return view('login', $data);
        }else{
            $session = session();
            // Ambil data input
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $users = new User();

            $cekUser = $users->where('username', $username)->first();

            if($cekUser){
                $passwordUser = $cekUser['password'];
                $cekPassword = password_verify($password, $passwordUser);

                if($cekPassword){
                    $sessionData = [
                        'logged_in' => true,
                        'role_id' => $cekUser['role'],
                        'username' => $cekUser['username'],
                    ];
                    $session->set($sessionData);

                    switch ($cekUser['role']) {
                        case 'Admin':
                            return redirect()->to('admin/home');
                        case 'Pegawai':
                            return redirect()->to('pegawai/home');
                        default:
                            $session->setFlashdata('message', 'Akun Anda belum terdaftar');
                            return redirect()->to('/');
                    }
                }else{
                    $session->setFlashdata('message', 'password salah, silahkan coba lagi');
                    return redirect()->to('/');    
                }
            }else{
                $session->setFlashdata('message', 'username salah, silahkan coba lagi');
                return redirect()->to('/');
            }
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
