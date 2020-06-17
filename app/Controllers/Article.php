<?php

namespace App\Controllers;

class Article extends BaseController
{
    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        $this->articleModel = new \App\Models\Article();
    }

    public function index()
    {
        $articles = $this->articleModel->findAll();

        echo view('listing', compact('articles'));
    }

    public function article($id)
    {
        $article = $this->articleModel->find($id);

        echo view('article', compact('article'));
    }

    public function login()
    {
        echo view('login');
    }

    public function new()
    {
        helper('form');
        $validation = \Config\Services::validation();


        $rules = [
            'title' => 'required',
            'content' => 'required',
            'image' => 'required'
        ];

        $result = null;

        if ($this->request->getPost()) {
            $validation->setRules($rules);

            if ($validation->withRequest($this->request)->run()) {
                $article = [
                    'title' => $this->request->getPost('title'),
                    'content' => $this->request->getPost('content'),
                    'image' => $this->request->getPost('image')
                ];

                $this->articleModel->insert($article);

                $result = 'Article created';
            } else {
                $result = $validation->listErrors();
            }
        }

        echo view('new', compact('result'));
    }
}
