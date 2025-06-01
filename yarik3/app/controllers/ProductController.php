<?php
require_once '../config/database.php';
require_once '../app/models/Product.php';

class ProductController
{
    private $pdo;
    private $productModel;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
        $this->productModel = new Product($pdo);
    }

    public function index()
    {
        $products = $this->productModel->getAllProducts();
        require '../app/views/products/index.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category_id = $_POST['category_id'];
            $firm_id = $_POST['firm_id'];

            // Validate inputs
            if (empty($name) || empty($description) || empty($price)) {
                echo "All fields are required!";
                return;
            }

            $this->productModel->addProduct($name, $description, $price, $category_id, $firm_id);
            header('Location: index.php?action=index');
        } else {
            require '../app/views/products/create.php';
        }
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category_id = $_POST['category_id'];
            $firm_id = $_POST['firm_id'];

            $this->productModel->updateProduct($id, $name, $description, $price, $category_id, $firm_id);
            header('Location: index.php?action=index');
        } else {
            $product = $this->productModel->getProductById($id);
            require '../app/views/products/edit.php';
        }
    }

    public function delete($id)
    {
        $this->productModel->deleteProduct($id);
        header('Location: index.php?action=index');
    }

    public function show($id)
    {
        $product = $this->productModel->getProductById($id);
        require '../app/views/products/show.php';
    }
}
?>
