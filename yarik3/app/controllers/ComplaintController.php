<?php
require_once '../config/database.php';
require_once '../app/models/Complaint.php';

class ComplaintController
{
    private $complaintModel;


    public function __construct($pdo)
    {
        $this->complaintModel = new Complaint($pdo);
    }

    public function index()
    {
        $user_id = $_SESSION['user_id'];
        $complaints = $this->complaintModel->getUserComplaints($user_id);
        require '../app/views/complaints/index.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $institution_name = $_POST['institution_name'];
            $description = $_POST['description'];
            $user_id = $_SESSION['user_id'];
            $this->complaintModel->createComplaint($user_id, $institution_name, $description);
            header('Location: index.php?action=complaints');
        } else {
            require '../app/views/complaints/create.php';
        }
    }
}
?>