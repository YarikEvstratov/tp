<?php

class Category
{
	private $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function getAllCategories()
	{
		$stmt = $this->pdo->query("SELECT * FROM `categories`");
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function getCategoryById($id)
	{
		$stmt = $this->pdo->prepare("SELECT * FROM `categories` WHERE `id` = :id");
		$stmt->execute(['id' => $id]);
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	public function addCategory($name)
	{
		$stmt = $this->pdo->prepare("INSERT INTO `categories` (`name`) VALUES (:name)");
		$stmt->execute(['name' => $name]);
	}
	public function updateCategory($id, $name)
	{
		$stmt = $this->pdo->prepare('UPDATE `categories` SET `name`=:name WHERE `id` = :id');
		$stmt->execute(['id' => $id, 'name' => $name]);
	}
	public function deleteCategory($id)
	{
		$stmt = $this->pdo->prepare("DELETE FROM `categories` WHERE `id` = :id");
		$stmt->execute(['id' => $id]);
	}
}