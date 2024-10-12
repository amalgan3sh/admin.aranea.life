<?php

namespace App\Models;

use CodeIgniter\Model;

class KycModel extends Model
{

    protected $DBGroup = 'default'; // Use default group

    public function __construct()
    {
        parent::__construct();
        
        // Load the second database connection
        $this->secondDb = \Config\Database::connect('second_db');
    }

    protected $table = 'kyc_verifications';
    protected $primaryKey = 'id';
    protected $allowedFields = ['full_name', 'address', 'phone_no', 'document_path','user_id'];

    public function getKycDetails()
    {
        try {
            $builder = $this->secondDb->table('kyc_verifications');
            $builder->join('users', 'kyc_verifications.user_id = users.user_id', 'inner');
            $builder->select('kyc_verifications.*, users.user_name as user_name');
            
            // Log the SQL query
            $queryString = $builder->getCompiledSelect();
            log_message('info', 'SQL Query: ' . $queryString);
            
            // Execute the query
            $query = $builder->get();
            
            // Fetch the result as an array
            $result = $query->getResultArray();
            
            // Log the result data
            if (empty($result)) {
                log_message('error', 'No results found for investment requests.');
            } else {
                log_message('info', 'Data fetched: ' . json_encode($result));
            }
            
            return $result;
        } catch (\Exception $e) {
            log_message('error', 'Error fetching investment requests: ' . $e->getMessage());
            return [];
        }
    }

    public function updateKycStatus($kycId, $data)
    {
        // Use the builder to update the record in the investment_request table
        $builder = $this->secondDb->table('kyc_verifications');
        
        // Specify the record to be updated and apply the data
        return $builder->where('id', $kycId)->update($data);
    }
    

   
}

?>