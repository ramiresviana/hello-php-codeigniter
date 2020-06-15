<?php namespace App\Controllers;

class Article extends BaseController
{
	public function index()
	{
		echo view('listing');
	}

	public function article()
	{
		echo view('article');
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
