<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        helper('form');
        $validation = \Config\Services::validation();

        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];

        $result = null;

        if ($this->request->getPost()) {
            $validation->setRules($rules);

            if ($validation->withRequest($this->request)->run()) {
                $userModel = new \App\Models\User();

                $username = $this->request->getPost('username');
                $password = $this->request->getPost('password');

                if ($userModel->authenticate($username, $password)) {
                    $this->session->set('logged', true);
                    return redirect()->to('/');
                } else {
                    $result = 'Invalid credentials';
                }
            } else {
                $result = $validation->listErrors();
            }
        }

        echo view('login', compact('result'));
    }

    public function logout()
    {
        if ($this->request->getPost()) {
            $this->session->destroy();
            return redirect()->to('/');
        }

        echo view('logout');
    }
}
