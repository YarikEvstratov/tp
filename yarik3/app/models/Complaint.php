<?php
class Complaint
{
    private $pdo;


    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }


    public function createComplaint($user_id, $institution_name, $description)
    {
        $stmt = $this->pdo->prepare('INSERT INTO complaints (user_id, institution_name, description, status) VALUES (:user_id, :institution_name, :description, "Under Review")');
        $stmt->execute(['user_id' => $user_id, 'institution_name' => $institution_name, 'description' => $description]);
    }


    public function getUserComplaints($user_id)
    { 
        $stmt = $this->pdo->prepare('SELECT * FROM complaints WHERE user_id = :user_id');
        $stmt->execute(['user_id' => $user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>