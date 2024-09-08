<?php

namespace App\Models;

use CodeIgniter\Model;

class SupportRequestModel extends Model
{

    protected $DBGroup = 'default'; // Use default group

    public function __construct()
    {
        parent::__construct();
        
        // Load the second database connection
        $this->secondDb = \Config\Database::connect('second_db');
    }

    protected $table = 'support_requests';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'message', 'created_at'];

    public function getSupportRequestsFromSecondDb()
    {
        // Use the second database connection to run a query
        $query = $this->secondDb->table($this->table)->get();

        // Return the results as an array of objects
        return $query->getResultArray();
    }
   
}

?>