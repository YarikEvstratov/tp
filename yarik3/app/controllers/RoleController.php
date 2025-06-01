<?php

class RoleController
{
	private $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function getAllRoles()
	{
		$stmt = $this->pdo->query("SELECT * FROM `roles`");
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function getRoleById($id)
	{
		$stmt = $this->pdo->prepare("SELECT * FROM `roles` WHERE `id` = :id");
		$stmt->execute(['id' => $id]);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);

	}
}