<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        // Checks if user is authenticated
        if ($this->session->get('logged')) {
            return redirect()->to('/');
        }

        helper('form');
        $validation = \Config\Services::validation();

        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];

        $result = null;

        if ($this->request->getPost()) {
            $validation->setRules($rules);

            // Validate the input
            if ($validation->withRequest($this->request)->run()) {
                $userModel = new \App\Models\User();

                $username = $this->request->getPost('username');
                $password = $this->request->getPost('password');

                // Create user authentication session
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

        // Render view
        echo view('login', compact('result'));
    }

    public function logout()
    {
        if (!$this->session->get('logged')) {
            return redirect()->to('/');
        }

        // Remove user authentication session
        if ($this->request->getPost()) {
            $this->session->destroy();
            return redirect()->to('/');
        }

        // Render view
        echo view('logout');
    }
}
