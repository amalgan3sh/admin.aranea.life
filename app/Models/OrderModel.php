<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $DBGroup = 'second_db';
    protected $table = 'b2b_orders';
    protected $primaryKey = 'order_id';
    protected $allowedFields = ['user_id', 'order_items', 'total_amount', 'status', 'created_at', 'updated_at'];
    
    // Declare the secondDb property to avoid dynamic property warning
    protected $secondDb;

    public function __construct()
    {
        parent::__construct();
        $this->secondDb = \Config\Database::connect('second_db'); // Explicitly declare the property
    }

    /**
     * Fetch list of all orders
     * @return array
     */
    public function getOrdersList()
    {
        return $this->table($this->table)
                    ->select('*')
                    ->get()
                    ->getResultArray();
    }

    public function getOrdersWithProductNames()
    {
        $orders = $this->select('*')->findAll();
        
        foreach ($orders as &$order) {
            // Decode the order_items JSON
            $items = json_decode($order['order_items'], true);
            
            // Extract only the ProductName from each item
            $productNames = [];
            foreach ($items as $item) {
                $productNames[] = $item['ProductName'];
            }

            // Join product names as a string, separated by commas, and add to the order data
            $order['product_names'] = implode(', ', $productNames);
        }

        return $orders;
    }

    /**
     * Fetch specific order details by order ID
     * @param int $orderId
     * @return array|null
     */
    public function getOrderById($orderId)
    {
        return $this->where('order_id', $orderId)
                    ->get()
                    ->getRowArray();
    }

    /**
     * Create a quotation for an order
     * @param int $orderId
     * @param float $quotationAmount
     * @return bool
     */
    public function createQuotation($orderId, $quotationAmount)
    {
        $data = [
            'status' => 'quoted',
            'quotation_amount' => $quotationAmount,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        return $this->update($orderId, $data);
    }

    /**
     * Reject an order
     * @param int $orderId
     * @param string $reason
     * @return bool
     */
    public function rejectOrder($orderId, $reason)
    {
        $data = [
            'status' => 'cancelled',
            'status_description' => $reason,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        return $this->update($orderId, $data);
    }

    /**
     * Count orders by their status
     * @return array
     */
    public function getOrderCountByStatus()
    {
        $data = [];
        $builder = $this->table($this->table);

        $data['pending_count'] = $builder->where('status', 'pending')->countAllResults(false);
        $data['quoted_count'] = $builder->where('status', 'quoted')->countAllResults(false);
        $data['rejected_count'] = $builder->where('status', 'rejected')->countAllResults(false);

        return $data;
    }
}