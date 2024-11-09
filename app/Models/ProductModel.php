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

    public function getManufacturerProductsList()
    {
        $results = $this->secondDb->table('manufacturer_products')
        ->select('*')
        ->get()
        ->getResultArray();

        return $results;
    }

    public function approveProduct($productId, $userId, $reason){
        // Use the builder to update the record in the investment_request table
        $builder = $this->secondDb->table('manufacturer_products');

        // Use the query builder provided by the model

        // First, check if an approval already exists for this product_id and user_id
        $builder->where('id', $productId);
        $builder->where('user_id', $userId);
        $query = $builder->get();

        if ($query->getNumRows() > 0) {
            // If an approval already exists, update the existing record
            $data = [
                'status_description' => $reason,
                'status' => 'approved'  // Optionally update the timestamp
            ];
            $builder->where('id', $productId);
            $builder->where('user_id', $userId);
            return $builder->update($data);
        } 
    }

    public function rejectProduct($productId, $userId, $reason){
        // Use the builder to update the record in the investment_request table
        $builder = $this->secondDb->table('manufacturer_products');

        // Use the query builder provided by the model

        // First, check if an approval already exists for this product_id and user_id
        $builder->where('id', $productId);
        $builder->where('user_id', $userId);
        $query = $builder->get();

        if ($query->getNumRows() > 0) {
            // If an approval already exists, update the existing record
            $data = [
                'status_description' => $reason,
                'status' => 'rejected'  // Optionally update the timestamp
            ];
            $builder->where('id', $productId);
            $builder->where('user_id', $userId);
            return $builder->update($data);
        } 
    }


    public function getProductsCountStatusWise() {

        $builder = $this->secondDb->table('manufacturer_products');
        $data = [];

       $data['approved_count'] = $builder
       ->where('status', 'approved')
       ->countAllResults(false);  // 'false' ensures the builder is not reset after counting

       $data['rejected_count'] = $builder
    ->where('status', 'rejected')
    ->countAllResults(false);  // 'false' ensures the builder is not reset after counting

   
    return $data;
    }

    
}

?>