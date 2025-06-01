<?php
class Image
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function addImage($product_id, $image_name, $image_path)
    {
        $stmt = $this->pdo->prepare("INSERT INTO `image` (product_id, image_name, image_path) VALUES (:product_id, :image_name, :image_path)");
        $stmt->execute([
            'product_id' => $product_id,
            'image_name' => $image_name,
            'image_path' => $image_path
        ]);
    }
    public function getImagesByProductId($product_id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM `images` WHERE `product_id` = :product_id');
        $stmt->execute(['product_id' => $product_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getImageById($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM `images` WHERE `id` = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteImage($id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM `images` WHERE `id` = :id');
        $stmt->execute(['id' => $id]);
    }
}