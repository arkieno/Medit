<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminAccountModel extends Model
{
    protected $table = 'admin'; // Change table name if necessary
    protected $primaryKey = 'id'; // Change primary key if necessary
    protected $allowedFields = ['name', 'email', 'password','is_admin']; // Add more fields if necessary

    // Optionally, you can define validation rules for admin account creation
    protected $validationRules = [
        'name' => 'required|min_length[2]|max_length[50]',
        'email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[admin.email]',
        'password' => 'required|min_length[4]|max_length[50]'
    ];

    protected $validationMessages = [
        'email' => [
            'is_unique' => 'The email address has already been taken.'
        ]
    ];

    protected $skipValidation = false; // Set to true if you want to skip validation during inserts and updates
}
