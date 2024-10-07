<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\User;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class RegisterController extends BaseController
{
    public function register()
    {
        $data = [
            'validation' => Services::validation(),
        ];
        return view('auth/register', $data);
    }

    public function registerAction()
    {
        // validate input text
        $validationRule = [
            // 'email' => [
            //     'rules' => 'required|max_length[100]|valid_email|is_unique[user.email]'
            // ],
            'username' => [
                'rules' => 'required|min_length[4]|max_length[30]|is_unique[users.username]'
            ],
            'password' => [
                'rules' => 'required|min_length[4]|max_length[50]'
            ],
            'password_confirm' => [
                'rules' => 'matches[password]'
            ]            
        ];
 
        if (!$this->validate($validationRule)) {
            $error = $this->validator->getErrors();
            $error_val = array_values($error);
            die(json_encode([
                'status' => false,
                'response' => $error_val[0]
            ])); 
        }           
 
        // input data
        // $data['email'] = $this->request->getPost('email');        
        $data['username'] = $this->request->getPost('username');
        $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        $data['role']     = 'Pegawai';
        $data['status']     = 'Active';
 
        // load model
        $userModel = new User();    
 
        // insert data
        $register = $userModel->insert($data);
 
        // build data
        $data = [
            'id' => $register,
            'username' => $data['username'],                
        ];
 
        // set session
        $session = session();
        $sessionData = [
            'logged_in' => true,
            'role_id' => 'Pegawai',
            'username' => $data['username'],
        ];
        $session->set($sessionData);

        // send response
        return $this->response->setJSON([
            'status' => true,
            'response' => 'Success Register',
            'redirect' => base_url('pegawai/home')
        ]); 
    }  
}
