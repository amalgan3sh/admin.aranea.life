<?php

namespace App\Models;

use CodeIgniter\Model;

class InvestmentRequestModel extends Model
{

    protected $DBGroup = 'default'; // Use default group

    public function __construct()
    {
        parent::__construct();
        
        // Load the second database connection
        $this->secondDb = \Config\Database::connect('second_db');
    }

    protected $table = 'investment_request';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'product_id', 'plan', 'status','time_stamp'];

    public function getInvestmentRequestsFromSecondDb()
{
    try {
        $builder = $this->secondDb->table('investment_request');
        
        // Use USING clause for joins
        $builder->join('users', 'users.user_id = investment_request.user_id', 'inner');
        $builder->join('product_data', 'product_data.product_id = investment_request.product_id', 'inner');
        
        // Select the required columns
        $builder->select('investment_request.*, users.user_name AS user_name, product_data.ProductName AS product_name');        
        // Log the SQL query
        $queryString = $builder->getCompiledSelect();
        log_message('info', 'SQL Query: ' . $queryString);
        
        // Execute the query and get results
        $query = $builder->get();
        $result = $query->getResultArray();
        
        // Check and log results
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

    public function updateInvestmentRequestStatus($investmentId, $data)
    {
        // Use the builder to update the record in the investment_request table
        $builder = $this->secondDb->table('investment_request');
        
        // Specify the record to be updated and apply the data
        return $builder->where('id', $investmentId)->update($data);
    }
    

   
}

?>