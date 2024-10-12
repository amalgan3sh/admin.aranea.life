<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{

    protected $DBGroup = 'default'; // Use default group
    protected $secondDb;

    public function __construct()
    { 
        parent::__construct();
        
        // Load the second database connection
        // $this->secondDb = \Config\Database::connect('second_db');
        $this->secondDb = \Config\Database::connect('second_db');
    }

    protected $table = 'product_data';
    protected $primaryKey = 'id';
    protected $allowedFields = ['ProductName', 'Content', 'DosageForm', 'Strength', 'TherapeuticUse', 'TabletShapeAndColor', 'Packaging', 'BatchNumber', 'ManufacturingDate', 'ExpiryDate', 'UnitSize', 'ShipperSize', 'icon', 'product_img_main', 'rating', 'product_images'];

    public function submitAddProduct($data)
    {
        
       // Use the query builder to insert data into the 'products' table
       $this->secondDb->table($this->table)->insert($data);
        
       // Check if the row was inserted
       if ($this->secondDb->affectedRows() > 0) {
           return true;
       } else {
           return false;
       }
    }

    public function getProductsList()
    {
        $results = $this->secondDb->table('product_data')
        ->select('*')
        ->get()
        ->getResultArray();

        return $results;
    }

    public function deleteProduct($id){
        return $this->secondDb->table($this->table)->delete(['product_id' => $id]);
    }
}

?>