<?php
require_once '../config/database.php';
require_once '../app/models/Complaint.php';

class AdminController
{
    private $complaintModel;

    public function __construct($pdo)
    {
        $this->complaintModel = new Complaint($pdo);
    }

    public function dashboard()
    { 
    header('Location: ../app/views/admin/dashboard.php');

    }


}
?>
