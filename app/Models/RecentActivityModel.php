<?php

namespace App\Models;

use CodeIgniter\Model;

class RecentActivityModel extends Model
{

    protected $DBGroup = 'default'; // Use default group

    public function __construct()
    {
        parent::__construct();
        
        // Load the second database connection
        $this->secondDb = \Config\Database::connect('second_db');
    }

    protected $table = 'recent_activity';
    protected $primaryKey = 'id';
    protected $allowedFields = ['type', 'amount', 'sataus', 'timestamp', 'user_id'];

    public function getRecentActivityWithUser()
    {
        $results = $this->secondDb->table('recent_activity')
        ->select('recent_activity.*, users.user_name')
        ->join('users', 'users.user_id = recent_activity.user_id', 'inner')
        ->get()
        ->getResultArray();

        // Format timestamp in DDMMYY HH:MM
        foreach ($results as &$row) {
            if (isset($row['timestamp'])) {
                $dateTime = new \DateTime($row['timestamp']);
                $row['timestamp'] = $dateTime->format('d-m-Y h:i A'); // Format to DD-MM-YYYY HH:MM AM/PM
            }
        }

        return $results;
    }
}

?>