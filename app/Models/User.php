<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    // Verify use crendetials
    public function authenticate($username, $password)
    {
        return $username == 'admin' && $password == 'admin';
    }
}
