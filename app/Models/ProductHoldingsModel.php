<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductHoldingsModel extends Model
{

    protected $DBGroup = 'second_db'; // Use default group
    protected $table = 'product_holdings';
    protected $primaryKey = 'holding_id';
    protected $allowedFields = ['product_id', 'product_name', 'holding_value', 'change_percentage', 'week_change', 'favorite', 'user_id', 'investment_amount', 'date_of_investment'];
    public function __construct()
    {
        parent::__construct();
        
        // Load the second database connection
        $this->secondDb = \Config\Database::connect('second_db');
    }

    
    
}

?>