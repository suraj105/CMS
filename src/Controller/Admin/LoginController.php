<?php

namespace App\Controller\Admin;

use App\Controller\AbstractController;
use App\Pages\PagesRepository;
use App\Support\AuthService;

class LoginController extends AbstractController {

    public function __construct(
        PagesRepository $pagesRepository, 
        protected AuthService $authService) {

        parent::__construct($pagesRepository);
    }

    public function logout() {
        $this->authService->logout();
        header("Location: ./?page=index");
    }

    public function login() {
        // Use authService's isLoggedIn check to avoid direct session access
        if ($this->authService->isLoggedIn()) {
            // User is already logged in, redirect to the admin page
            header("Location: ./?route=admin/page");
            exit; // Ensure script stops after the redirect
        }

        // Handle login if POST data is submitted
        if (!empty($_POST)) {
            $username = @(string) ($_POST['username'] ?? '');
            $password = @(string) ($_POST['password'] ?? '');

            // Check if both username and password are provided
            if (!empty($username) && !empty($password)) {
                $loginOk = $this->authService->handleLogin($username, $password);

                // If login is successful, redirect to the admin page
                if ($loginOk) {
                    header("Location: ./?route=admin/page");
                    exit; // Stop further script execution after redirect
                }
            }

            // Redirect to the login page if login fails
            header("Location: ./?route=admin/login");
            exit; // Stop further script execution after redirect
        }

        // If no POST data, render the login page
        $this->renderAdmin('login/login', []);
    }


}