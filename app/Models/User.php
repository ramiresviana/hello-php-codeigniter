<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    public function authenticate($username, $password)
    {
        return $username == 'admin' && $password == 'admin';
    }
}
