<?php

namespace App\Controllers;

class Api extends BaseController
{
    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        $this->articleModel = new \App\Models\Article();
        $this->userModel = new \App\Models\User();
    }

    // Checks user credentials and returns error
    protected function auth()
    {
        $username = $this->request->getServer('PHP_AUTH_USER');
        $password = $this->request->getServer('PHP_AUTH_PW');

        if (!$username || !$password) {
            return $this->response->setStatusCode(401)->setJSON('auth_required');
        }

        if (!$this->userModel->authenticate($username, $password)) {
            return $this->response->setStatusCode(403)->setJSON('invalid_credentials');
        }
    }

    public function new()
    {
        $authError = $this->auth();

        // Checks user credentials
        if ($authError) {
            return $authError;
        }

        helper('form');
        $validation = \Config\Services::validation();

        $rules = [
            'title' => 'required',
            'content' => 'required',
            'image' => 'uploaded[image]|is_image[image]'
        ];

        $result = null;

        $validation->setRules($rules);

        // Validate the input
        if ($validation->withRequest($this->request)->run()) {
            $imageName = $this->request->getFile('image')->getRandomName();
            $this->request->getFile('image')->move(FCPATH . 'uploads', $imageName);

            $article = [
                'title' => $this->request->getPost('title'),
                'content' => $this->request->getPost('content'),
                'image' => $imageName
            ];

            $this->articleModel->insert($article);

            $result = 'article_created';
        } else {
            $result = $validation->getErrors();
        }

        // Result response
        return $this->response->setJSON($result);
    }

    public function create()
    {
        $this->new();
    }

    public function index($page = 1)
    {
        $itemsPerPage = 5;
        $numberOfPages = ceil($this->articleModel->count() / $itemsPerPage);

        $articles = $this->articleModel->paginate($itemsPerPage, 'articles', $page);

        // Pagination result
        $result = new \stdClass;
        $result->numberOfPages = $numberOfPages;
        $result->articles = $articles;

        // Result response
        return $this->response->setJSON($result);
    }

    public function show($id)
    {
        $article = $this->articleModel->find($id);

        // Check if article exists
        if ($article == null) {
            return $this->response->setStatusCode(404)->setJSON('not_found');
        }

        // Result response
        return $this->response->setJSON($article);
    }

    public function edit($id)
    {
        $authError = $this->auth();

        // Checks user credentials
        if ($authError) {
            return $authError;
        }

        $article = $this->articleModel->find($id);

        // Check if article exists
        if ($article == null) {
            return $this->response->setStatusCode(404)->setJSON('not_found');
        }

        helper('form');
        $validation = \Config\Services::validation();

        $rules = [
            'title' => 'required',
            'content' => 'required',
            'image' => 'uploaded[image]|is_image[image]'
        ];

        $result = null;

        $validation->setRules($rules);

        // Validate the input
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

            $result = 'article_updated';
        } else {
            $result = $validation->getErrors();
        }

        // Result response
        return $this->response->setJSON($result);
    }

    public function update($id)
    {
        $this->edit($id);
    }

    public function delete($id)
    {
        $auth = $this->auth();

        // Checks user credentials
        if ($auth) {
            return $auth;
        }

        $article = $this->articleModel->find($id);

        // Check if article exists
        if ($article == null) {
            return $this->response->setStatusCode(404)->setJSON('not_found');
        }

        $result = null;

        $image = FCPATH . 'uploads' . DIRECTORY_SEPARATOR . $article->image;

        if (file_exists($image)) {
            unlink($image);
        }

        $this->articleModel->delete($id);

        $result = 'article_deleted';

        // Result response
        return $this->response->setJSON($result);
    }
}
