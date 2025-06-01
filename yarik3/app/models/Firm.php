<?php

class Firm
{
	private $pdo;
	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}
	public function getAllFirms()
	{
		$stmt = $this->pdo->query("SELECT * FROM `firms`");
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
		exit();
	}
	public function getFirmById($id)
	{
		$stmt = $this->pdo->prepare("SELECT * FROM `firms` WHERE `id` = :id");
		$stmt->execute(['id' => $id]);
		return $stmt->fetch(PDO::FETCH_ASSOC);
		exit();
	}
	public function addFirm($name, $description)
	{
		$stmt = $this->pdo->prepare("INSERT INTO `firms` (`name`, `description`) VALUES (:name, :description)");
		$stmt->execute(['name' => $name, 'description' => $description]);
	}
	public function updateFirm($id, $name, $description)
	{
		$stmt = $this->pdo->prepare('UPDATE `firms` SET `name`=:name, `description`=:description WHERE `id` = :id');
		$stmt->execute(['id' => $id, 'name' => $name, 'description' => $description]);
		exit();
	}
	public function deleteFirm($id)
	{
		$stmt = $this->pdo->prepare("DELETE FROM `firms` WHERE `id` = :id");
		$stmt->execute(['id' => $id]);
	}
}
?>