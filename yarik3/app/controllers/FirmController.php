<?php
class FirmController
{
	private $firmModel;

	public function __construct($pdo)
	{
		$this->firmModel = new Firm($pdo);
	}
	public function firmIndex()
	{
		$firms = $this->firmModel->getAllFirms();
		require '../app/views/firms/index.php';
		exit();
	}
	public function firmShow($id)
	{
		$firm = $this->firmModel->getFirmById($id);
		require '../app/views/firms/show.php';
	}
	public function firmCreate()
	{
		require '../app/views/firms/create.php';
	}
	public function firmStore()
	{
		$name = $_POST['name'];
		$description = $_POST['description'];
		$this->firmModel->addFirm($name, $description);
		require '../app/views/products/index.php';
	}
	public function firmEdit($id)
	{
		$firm = $this->firmModel->getFirmById($id);
		require '../app/views/firms/edit.php';
	}
	public function firmUpdate($id)
	{
		$name = $_POST['name'];
		$description = $_POST['description'];
		$this->firmModel->updateFirm($id, $name, $description);
		require '../app/views/products/index.php';
	}
	public function firmDestroy($id)
	{
		$this->firmModel->deleteFirm($id);
		require '../app/views/products/index.php';
		exit();
	}
}
?>