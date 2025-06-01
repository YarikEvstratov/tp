<?php
require_once "../config/database.php";
require_once __DIR__ . '/../models/Cart.php';
require_once __DIR__ . "/../models/Product.php";
require_once __DIR__ . "/../models/Image.php";

class CartController
{
    private $pdo;
    private $cartModel;
    private $productModel;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
        $this->productModel = new Product($pdo);
        $this->cartModel = new Cart($pdo);
    }

    public function index()
    {
        $user_id = 2;
        $cartItems = $this->cartModel->getAllCartItems($user_id, $this->productModel);
        $imageModel = new Image($this->pdo);
        
        foreach ($cartItems as $key => $cartItem) {
            $images = $imageModel->getImagesByProductId($cartItem['product_id']);
            $cartItems[$key]['images'] = $images;
            $product = $this->productModel->getProductById($cartItem['product_id']);
            $cartItems[$key]['category_name'] = $product['category_name'];
            $cartItems[$key]['firm_name'] = $product['firm_name'];
            $cartItems[$key]['description'] = $product['description'];
        }
        require '../app/views/cart/index.php';
    }

    public function addToCart($product_id)
    {
        $user_id = $_SESSION['user_id'];
        $cart_item = $this->cartModel->getCartItemByProductId($product_id, $user_id);
        if ($cart_item) {
            $this->cartModel->updateCartItem($cart_item['id'], ++$cart_item['quantity']);
        } else {
            $this->cartModel->addCartItem($user_id, $product_id, 1);
        }
        header('Location: index.php?action=cart');
    }

    public function updateCart($id, $quantity)
    {
        $this->cartModel->updateCartItem($id, $quantity);
        header('Location: index.php?action=cart');
    }

    public function deleteCart($id)
    {
        $this->cartModel->deleteCartItem($id);
        header('Location: index.php?action=cart');
    }

    public function getTotalSum()
    {
        $user_id = $_SESSION['user_id'];
        return $this->cartModel->getTotalSum($user_id);
    }
}
?>
