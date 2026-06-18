<?php
session_start();
include 'DBConn.php';

if(!isset($_SESSION['user_id'])){
    die("Please login.");
}
?>

<form action="save_request.php"
      method="POST"
      enctype="multipart/form-data">

    <input type="text"
           name="name"
           placeholder="Product Name"
           required>

    <input type="text"
           name="brand"
           placeholder="Brand"
           required>

    <textarea name="description"
              placeholder="Description"
              required></textarea>

    <input type="number"
           name="price"
           placeholder="Price"
           required>

    <input type="file"
           name="image"
           required>

    <button type="submit">
        Submit Product Request
    </button>

</form>