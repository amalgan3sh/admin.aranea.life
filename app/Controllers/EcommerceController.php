<?php

namespace App\Controllers;
use App\Models\ProductModel;
use App\Models\RecentActivityModel;
use App\Models\UserModel;

use CodeIgniter\Controller;

class EcommerceController extends Controller
{

    public function _construct(){
        $this->session = session();
    }
    public function EcommerceDashboard()
    {
        // Load the ecommerce_home view
        $ProductModel = new ProductModel();
        
        $data = [];

        $data = $ProductModel->getProductsCountStatusWise();
        $manufacture_products_list = $ProductModel->getManufacturerProductsList();

        $total_count = count($manufacture_products_list);
        $data['total_count'] =  $total_count;

        $data['added_product_total'] = count($ProductModel->getProductsList());

        $RecentActivityModel = new RecentActivityModel();
        $data['recent_activity'] = $RecentActivityModel->getRecentActivityWithUser();

        $UserModel = new UserModel();
        $data['users_list'] = $UserModel->getUsersList();

        echo view('ecommerce/ecommerce_header');
        echo view('ecommerce/ecommerce_dashboard', $data);
    }
    public function AddProduct()
    {
        // Load the ecommerce_home view
        // echo view('ecommerce/ecommerce_header');
        echo view('ecommerce/ecommerce_add_product');
    }
    public function ProductList(){
        // Load the ecommerce_home view
        // echo view('ecommerce/ecommerce_header');
        $ProductModel = new ProductModel();
        
        $data = [];

        $data['product_list'] = $ProductModel->getProductsList();
        echo view('ecommerce/ecommerce_product_list', $data);

    }
    public function DeleteProduct(){
        $ProductModel = new ProductModel();

        $product_id = $this->request->getVar('id');

        // Validate product ID (check if it's not empty and is a valid ID)
        if (empty($product_id)) {
            return redirect()->to('/product_list')->with('error', 'Product ID is invalid.');

        }

        // Attempt to delete the product
        if ($ProductModel->deleteProduct($product_id)) {
            return redirect()->to('/product_list')->with('success', 'Product deleted successfully.');
        } else {
            return redirect()->to('/product_list')->with('error', 'Failed to delete product. Please try again.');
        }
    }
    public function SubmitAddProduct(){

        $ProductModel = new ProductModel();
        // Fetch values from the form
		$product_name = $this->request->getPost('product_name');
		// $product_description = $this->input->post('product_description');
		$content = $this->request->getPost('content');
		$dosage_form = $this->request->getPost('dosage_form');
		$strength = $this->request->getPost('strength');
		$therapeutic_use = $this->request->getPost('therapeutic_use');
		$tab_shape_and_color = $this->request->getPost('tab_shape_and_color');
		$packaging = $this->request->getPost('packaging');
		$batch_number = $this->request->getPost('batch_number');
		$manufacturing_date = $this->request->getPost('manufacturing_date');
		$expiry_date = $this->request->getPost('expiry_date');
		$unit_size = $this->request->getPost('unit_size');

        $upload_path = FCPATH . './public/assets/product_images/';

        // Set the upload path in the configuration
		$config['upload_path'] = $upload_path;
		$config['allowed_types'] = 'gif|jpg|jpeg|png|pdf'; // Define allowed file types
		$config['max_size'] = 1024 * 5; // Define max file size (in KB)

       


        $data = [
            'ProductName' => $product_name,
            // 'product_description' => $product_description,
            'Content' => $content,
            'DosageForm' => $dosage_form,
            'Strength' => $strength,
            'TherapeuticUse' => $therapeutic_use,
            'TabletShapeAndColor' => $tab_shape_and_color,
            'Packaging' => $packaging,
            'BatchNumber' => $batch_number,
            'ManufacturingDate' => $manufacturing_date,
            'ExpiryDate' => $expiry_date,
            'UnitSize' => $unit_size,
            'icon' => $this->request->getPost('icon') // Save file name to database
        ];


        // Handle file uploads (images)
       if ($productImage = $this->request->getFile('main_product_image')) {
            if ($productImage->isValid() && !$productImage->hasMoved()) {
                $productImage->move($upload_path);
                $data['product_img_main'] = $productImage->getName();
            }
        }
        
        $uploadedFiles = '';
        if ($productImages = $this->request->getFiles('other_product_images')) {

            $delimiter = '';
            // Loop through each file
            foreach ($productImages['other_product_images'] as $productImage) {
                // Check if the file is valid and has not been moved yet
                if ($productImage->isValid() && !$productImage->hasMoved()) {
                    // Move the file to the desired upload path
                    $productImage->move($upload_path);
                    
                    // You can store the file name in an array or process it accordingly
                    $uploadedFiles = $uploadedFiles.$delimiter.$productImage->getName();
                    $delimiter = '|';
                }
            }
        }

            $data['product_images'] = $uploadedFiles;



        // return 'Success';

        $response = $ProductModel->submitAddProduct($data);
			if($response ==true){
                return redirect()->to('/add_product?message=Product added successfully.');
                // echo view('ecommerce/ecommerce_add_product');
			}
    }
}