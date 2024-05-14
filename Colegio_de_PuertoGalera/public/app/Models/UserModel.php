<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'email', 'password','user_type', 'created_at', 'profile_picture', 'verification_code', 'verified', 'is_super_admin', 'status','verification_code_expiration'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

        // Method to check if email is verified
        public function isEmailVerified($email)
        {
            $user = $this->where('email', $email)->first();
            if ($user && $user['verified'] == true) {
                return true;
            }
            return false;
        }
        public function updateStatus($userId, $status)
    {
        $data = ['status' => $status];
        $this->db->where('id', $userId);
        $this->db->update('users', $data);
    }
    
    public function getStatus($userId)
    {
        return $this->db->get_where('users', ['id' => $userId])->row('status');
    }
    public function updateResetCode($email, $resetCode)
    {
        $this->where('email', $email)->set('reset_code', $resetCode)->update();
    }

    public function verifyResetCode($email, $resetCode)
    {
        $user = $this->where('email', $email)->where('reset_code', $resetCode)->first();
        return $user !== null;
    }

    public function updateVerificationCode($email, $verificationCode)
    {
        $this->where('email', $email)->set('verification_code', $verificationCode)->update();
    }

    public function verifyVerificationCode($email, $verificationCode)
    {
        $user = $this->where('email', $email)->where('verification_code', $verificationCode)->first();
        return $user !== null;
    }

    public function updatePassword($email, $newPassword)
    {
        $this->where('email', $email)->set('password', $newPassword)->update();
    }
}