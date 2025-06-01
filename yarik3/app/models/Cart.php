<?php

class Cart
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllCartItems($user_id, $productModel)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM `cart` WHERE `user_id` = :user_id");
        $stmt->execute(['user_id' => $user_id]);
        $cart_items = $stmt->fetchAll();
        foreach ($cart_items as &$cart_item) {
            $product = $productModel->getProductById($cart_item['product_id']);
            $cart_item['name'] = $product['name'];
            $cart_item['price'] = $product['price'];
        }
        return $cart_items;
    }

    public function getCartItemById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM `cart` WHERE `id` = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function getCartItemByProductId($product_id, $user_id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM `cart` WHERE `product_id` = :product_id AND `user_id` = :user_id");
        $stmt->execute(['product_id' => $product_id, 'user_id' => $user_id]);
        return $stmt->fetch();
    }

    public function addCartItem($user_id, $product_id, $quantity)
    {
        $stmt = $this->pdo->prepare("INSERT INTO `cart` (`product_id`, `user_id`, `quantity`) VALUES (:product_id, :user_id, :quantity)");
        $stmt->execute(['product_id' => $product_id, 'user_id' => $user_id, 'quantity' => $quantity]);
    }

    public function updateCartItem($id, $quantity)
    {
        $stmt = $this->pdo->prepare("UPDATE `cart` SET `quantity` = :quantity WHERE `id` = :id");
        $stmt->execute(['quantity' => $quantity, 'id' => $id]);
    }

    public function deleteCartItem($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM `cart` WHERE `id` = :id");
        $stmt->execute(['id' => $id]);
    }

    public function getTotalSum($user_id)
    {
        $stmt = $this->pdo->prepare('SELECT SUM(c.quantity * p.price) AS total_sum FROM `cart` c JOIN `products` p ON c.product_id = p.id WHERE c.user_id = :user_id');
        $stmt->execute(['user_id' => $user_id]);
        $result = $stmt->fetch();
        return $result['total_sum'] ?? 0;
    }
}
?>