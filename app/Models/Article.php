<?php

namespace App\Models;

use CodeIgniter\Model;

class Article extends Model
{
    protected $allowedFields = ['title', 'content', 'image'];
    protected $table = 'article';
    protected $primaryKey = 'id';
    protected $returnType = 'object';

    // Returns the number of articles
    public function count()
    {
        return $this->countAll();
    }
}
