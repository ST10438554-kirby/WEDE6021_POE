<?php

session_start();
include 'DBConn.php';

$seller_id = $_SESSION['user_id'];

$name = $_POST['name'];
$brand = $_POST['brand'];
$description = $_POST['description'];
$price = $_POST['price'];

$image = $_FILES['image']['name'];

move_uploaded_file(
    $_FILES['image']['tmp_name'],
    "images/".$image
);

$stmt = $conn->prepare("
INSERT INTO tblProducts
(name, brand, description, price, seller_id, image, approved)
VALUES (?, ?, ?, ?, ?, ?, 0)
");

$stmt->bind_param(
    "sssdis",
    $name,
    $brand,
    $description,
    $price,
    $seller_id,
    $image
);

$stmt->execute();

echo "Product submitted for approval.";
?>