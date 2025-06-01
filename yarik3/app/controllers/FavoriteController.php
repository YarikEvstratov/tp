<?php
require_once '../config/database.php';
require_once __DIR__ . '/../models/Favorite.php';


class FavoriteController
{
	private $pdo;
	private $favoriteModel;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
		$this->favoriteModel = new Favorite($pdo);
	}
	public function index()
	{
		$user_id = $_SESSION['user_id'];
		$FavoriteModel = new Favorite($this->pdo);
		$FavoriteItems = $FavoriteModel->getAllFavoriteItems($user_id, new Product($this->pdo));
		$imageModel = new Image($this->pdo);
		$productModel = new Product($this->pdo);
		foreach ($FavoriteItems as $key => $FavoriteItem) {
			$images = $imageModel->getImagesByProductId($FavoriteItem['product_id']);
			$FavoriteItems[$key]['images'] = $images;
			$product = $productModel->getProductById($FavoriteItem['product_id']);
			$FavoriteItems[$key]['category_name'] = $product['category_name'];
			$FavoriteItems[$key]['firm_name'] = $product['firm_name'];
			$FavoriteItems[$key]['description'] = $product['description'];
		}
		require '../app/views/products/index.php';
	}
	public function addToFavorites($product_id)
	{
		$user_id = 2;
		$favorite_item = $this->favoriteModel->getfavoriteItemByProductId($product_id, $user_id);
		header('Location: index.php?action=favorite');
	}
	public function deleteFavorite($id, $user_id)
	{
		$user_id = 2;
		$this->favoriteModel->deletefavoriteItem($id, $user_id);
		header('Location: index.php?action=favorite');
	}
}