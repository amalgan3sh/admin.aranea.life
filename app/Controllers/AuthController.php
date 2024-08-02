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
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $this->getUserByUsername($username);

        if ($user && $this->verifyPassword($password, $user['password'])) {
            if ($this->isSuperAdmin($user)) {
                $this->setUserSession($user);
                return $this->jsonResponse(['success' => true]);
            } else {
                return $this->jsonResponse(['success' => false, 'message' => 'Access restricted to super_admin only']);
            }
        }

        return $this->jsonResponse(['success' => false, 'message' => 'Invalid username or password']);
    }

    private function getUserByUsername($username)
    {
        $userModel = new UserModel();
        return $userModel->where('email', $username)->first();
    }

    private function verifyPassword($inputPassword, $storedPassword)
    {
        return password_verify($inputPassword, $storedPassword);
    }

    private function isSuperAdmin($user)
    {
        return $user['role'] === 'super_admin';
    }

    private function setUserSession($user)
    {
        $session = session();
        $sessionData = [
            'user_id' => $user['user_id'],
            'username' => $user['username'],
            'role' => $user['role'],
            'logged_in' => true,
            'active' => true  // Assuming you want to set the 'active' status here
        ];
        $session->set($sessionData);
    }

    private function jsonResponse($data)
    {
        return $this->response->setJSON($data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }

    public function register()
    {
        // Display the registration form
        return view('public/auth-register');
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
            return $this->jsonResponse(['success' => true]);
        } else {
            return $this->jsonResponse(['success' => false]);
        }
    }
}