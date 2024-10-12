<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['username', 'email', 'password', 'mobile_number', 'role'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';



    public function updateKycStatus($userId, $data)
    {
        $this->secondDb = \Config\Database::connect('second_db');
        // Use the builder to update the record in the investment_request table
        $builder = $this->secondDb->table('users');
        $queryString = $builder->getCompiledSelect();
        log_message('info', 'SQL Query Users: ' . $queryString);
        // Specify the record to be updated and apply the data
        return $builder->where('user_id', $userId)->update($data);
    }
}
