<?php
class User
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function register($fullname, $username, $password, $role)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare('INSERT INTO users (fullname, username, password, role) 
        VALUES (:fullname, :username, :password, :role)');
        $stmt->execute(['fullname' => $fullname, 'username' => $username, 'password' => 
        $hashedPassword, 'role' => $role]);
    }

    public function login($username, $password)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password'])) {
            return $user; // Return user data if credentials are valid
        } 
        return false; // Return false if credentials are invalid
    }

    public function getUserById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateUser ($id, $username, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare('UPDATE users SET username = :username, password = :password WHERE id = :id');
        $stmt->execute(['username' => $username, 'password' => $hashedPassword, 'id' => $id]);
    }
}
?>
