<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'username',
        'email',
        'password_hash',
        'reset_token',
        'reset_token_expires',
        'profile_picture'
    ];
    protected $useTimestamps = true;
}

