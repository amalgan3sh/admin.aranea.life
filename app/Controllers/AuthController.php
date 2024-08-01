<?php
namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function login()
    {
        // Display the login form
        return view('auth/login');
    }

    public function verifyLogin()
    {
        $userModel = new UserModel();
    
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
    
        // Retrieve user by username
        $user = $userModel->where('email', $username)->first();
    
        if ($user) {
            // Verify hashed password
            if (password_verify($password, $user['password'])) {
                // Check if user is a super_admin
                if ($user['role'] === 'super_admin') {
                    // Password and role are correct
                    $session = session();
                    $sessionData = [
                        'user_id' => $user['user_id'],
                        'username' => $user['username'],
                        'role' => $user['role'],
                        'logged_in' => TRUE
                    ];
                    $session->set($sessionData);
    
                    return $this->response->setJSON(['success' => true]);
                } else {
                    // Role is not super_admin
                    return $this->response->setJSON(['success' => false, 'message' => 'Access restricted to super_admin only']);
                }
            } else {
                // Password doesn't match
                return $this->response->setJSON(['success' => false, 'message' => 'Invalid password']);
            }
        } else {
            // User not found
            return $this->response->setJSON(['success' => false, 'message' => 'User not found']);
        }
    }
    

    
    

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
    public function register()
    {
        // Display the registration form
        return view('auth-register');
    }
    public function registerUser()
    {
        $userModel = new UserModel();

        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'mobile_number' => $this->request->getPost('mobile_number')
        ];

        if ($userModel->save($data)) {
            return $this->response->setJSON(['success' => true]);
        } else {
            return $this->response->setJSON(['success' => false]);
        }
    }
}
