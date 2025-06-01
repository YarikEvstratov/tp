<?php
require_once '../config/database.php';
require_once '../app/models/User.php';

class AuthController
{
    private $userModel;

    public function __construct($pdo)
    {
        $this->userModel = new User($pdo);
    }    

    public function showlogoutForm()
    {
        require '../public/index.php';
    }

    public function logout()
    {
        setcookie('id', '', time());
        header('Location: ../public/');
    }

    public function showLoginForm()
    {
        require '../app/views/auth/login.php';
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = $this->userModel->login($username, $password);
            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['role'] = $user['role'];
                setcookie('id', $user['id'], time() + 60 * 60 * 24);
                header('Location: ../public/');
                exit();
            } else {
                echo "Invalid login credentials!";
            }
        } else {
            require '../app/views/auth/login.php';
        }
    }

    public function showRegisterForm()
    {
        require '../app/views/auth/register.php';
    }          

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fullname = $_POST['fullname'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $role = $_POST['role'];
            if (empty($fullname) || empty($username) || empty($password)) {
                echo "All fields are required!";
                return;
            }
            $this->userModel->register($fullname, $username, $password, $role);
            header('Location: index.php?action=login');
        } else {
            require '../app/views/auth/register.php';
        }
    }

    public function updateProfile() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user_id = $_SESSION['user_id'];
            $this->userModel->updateUser ($user_id, $username, $password);
            header('Location: index.php?action=user_dashboard&success=true');
        }
    }
}
?>
