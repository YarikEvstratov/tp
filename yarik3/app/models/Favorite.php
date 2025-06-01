<?php
class Favorite
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function getAllFavoriteItems()
    {
        $stmt = $this->pdo->query('SELECT * FROM `favorite`');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getFavoriteById($id, $user_id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM `favorite` WHERE `id` = :id AND `user_id` = :user_id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function addToFavorites($user_id, $product_id)
    {
        $stmt = $this->pdo->prepare('INSERT INTO `favorites`(`user_id`, `product_id`) VALUES (:user_id, :product_id)');
        $stmt->execute(['user_id' => $user_id, 'product_id' => $product_id]);
    }
    public function deleteFavorite($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM `favorite` WHERE `id` = :id");
        $stmt->execute(['id' => $id]);
    }
}
?>