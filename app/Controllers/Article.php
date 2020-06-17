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
            'image' => 'uploaded[image]|is_image[image]'
        ];

        $result = null;

        if ($this->request->getPost()) {
            $validation->setRules($rules);

            if ($validation->withRequest($this->request)->run()) {
                $imageName = $this->request->getFile('image')->getRandomName();
                $this->request->getFile('image')->move(FCPATH . 'uploads', $imageName);

                $article = [
                    'title' => $this->request->getPost('title'),
                    'content' => $this->request->getPost('content'),
                    'image' => $imageName
                ];

                $this->articleModel->insert($article);

                $result = 'Article created';
            } else {
                $result = $validation->listErrors();
            }
        }

        echo view('new', compact('result'));
    }

    public function edit($id)
    {
        $article = $this->articleModel->find($id);

        helper('form');
        $validation = \Config\Services::validation();

        $rules = [
            'title' => 'required',
            'content' => 'required',
            'image' => 'uploaded[image]|is_image[image]'
        ];

        $result = null;

        if ($this->request->getPost()) {
            $validation->setRules($rules);

            if ($validation->withRequest($this->request)->run()) {
                $uploadsPath = FCPATH . 'uploads' . DIRECTORY_SEPARATOR;
                $oldImage = FCPATH . 'uploads' . DIRECTORY_SEPARATOR . $article->image;

                if (file_exists($oldImage)) {
                    unlink($oldImage);
                }

                $imageName = $this->request->getFile('image')->getRandomName();
                $this->request->getFile('image')->move($uploadsPath, $imageName);

                $newData = [
                    'id' => $id,
                    'title' => $this->request->getPost('title'),
                    'content' => $this->request->getPost('content'),
                    'image' => $imageName
                ];

                $this->articleModel->save($newData);
                $article = $this->articleModel->find($id);

                $result = 'Article updated';
            } else {
                $result = $validation->listErrors();
            }
        }

        echo view('edit', compact('article', 'result'));
    }
}
