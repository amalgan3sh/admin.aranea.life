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
    
        // Special case for admin login
        if ($username == 'admin@gmail.com' && $password == 'admin') {
            $session = session();
            $sessionData = [
                'user_id' => 1, // assuming admin ID as 1
                'username' => $username,
                'role' => 'admin',
                'logged_in' => TRUE
            ];
            $session->set($sessionData);
    
            return redirect()->to('/dashboard'); // Redirect to dashboard or home page
        }
    
        // Normal user login
        $user = $userModel->where('username', $username)->first();
        
        if ($user) {
            if ($password == $user['password']) { // Direct comparison without hashing
                // Login successful
                $session = session();
                $sessionData = [
                    'user_id' => $user['user_id'],
                    'username' => $user['username'],
                    'role' => $user['role'],
                    'logged_in' => TRUE
                ];
                $session->set($sessionData);
                
                return redirect()->to('/dashboard'); // Redirect to dashboard or home page
            } else {
                // Password doesn't match
                return redirect()->back()->withInput()->with('error', 'Invalid password');
            }
        } else {
            // User not found
            return redirect()->back()->withInput()->with('error', 'User not found');
        }
    }
    

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
