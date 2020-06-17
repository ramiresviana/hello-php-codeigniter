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
        echo view('new');
    }
}
