<?php
session_start();
require_once '../config/database.php';
require_once '../app/controllers/AuthController.php';
require_once '../app/controllers/AdminController.php';
require_once '../app/controllers/ProductController.php';
require_once '../app/controllers/ChatController.php';
require_once '../app/controllers/ComplaintController.php';

$action = $_GET['action'] ?? 'home';
$id = $_GET['id'] ?? null;

$authController = new AuthController($pdo);
$adminController = new AdminController($pdo);
$productController = new ProductController($pdo);
$chatController = new ChatController($pdo);
$complaintController = new ComplaintController($pdo);

// Routing logic
switch ($action) {
    case 'register':
        $authController->register();
        break;
    case 'admin':
        $adminController->dashboard();
        break;
    case 'login':
        $authController->login();
        break;
    case 'logout':
        $authController->logout();
        break;
    case 'home':
        require '../app/views/home.php'; // Ensure this file exists
        break;
    case 'create_product':
        $productController->create();
        break;
    case 'chat':
        $chatController->index();
        break;
    case 'send_message':
        $chatController->sendMessage();
        break;
    case 'complaints':
        $complaintController->index();
        break;
    case 'create_complaint':
        $complaintController->create(); 
        break;
    case 'update_profile':
        $authController->updateProfile();
        break;
    default:
        $authController->showLoginForm();
        break;
}
?>
