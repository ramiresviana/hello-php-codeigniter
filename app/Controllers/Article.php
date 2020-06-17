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

        if ($article == null) {
            return redirect()->to('/');
        }

        echo view('article', compact('article'));
    }

    public function new()
    {
        if (!session()->get('logged')) {
            return redirect()->to('/login');
        }

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
        if (!session()->get('logged')) {
            return redirect()->to('/login');
        }

        $article = $this->articleModel->find($id);

        if ($article == null) {
            return redirect()->to('/');
        }

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

    public function remove($id)
    {
        if (!session()->get('logged')) {
            return redirect()->to('/login');
        }

        $article = $this->articleModel->find($id);

        if ($article == null) {
            return redirect()->to('/');
        }

        if ($this->request->getPost()) {
            $image = FCPATH . 'uploads' . DIRECTORY_SEPARATOR . $article->image;

            if (file_exists($image)) {
                unlink($image);
            }

            $this->articleModel->delete($id);

            return redirect()->to('/');
        }

        echo view('remove');
    }
}
