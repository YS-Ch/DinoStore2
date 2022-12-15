<?php
// Get the product data
$productName = filter_input(INPUT_POST, 'productName');
$productDescription = filter_input(INPUT_POST, 'productDescription');
$productPrice = filter_input(INPUT_POST, 'productPrice', FILTER_VALIDATE_INT);
$productImage = filter_input(INPUT_POST, 'productImage', FILTER_VALIDATE_URL);

// Validate inputs
if ($productImage == null || $productImage == false ||
        $productDescription == null || $productDescription == false || $productName == null || 
        $productName == false || $productPrice == null || $productPrice == false) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database_admin.php');

    // Add the product to the database  
    $query = 'INSERT INTO products
                 (productName, productDescription, productPrice, productImage)
              VALUES
                 (:productName, :productDescription, :productPrice, :productImage)';
    $statement = $db->prepare($query);
    $statement->bindValue(':productName', $productName);
    $statement->bindValue(':productDescription', $productDescription);
    $statement->bindValue(':productPrice', $productPrice);
    $statement->bindValue(':productImage', $productImage);
    $statement->execute();
    $statement->closeCursor();

    // Display the product list
    include('list_all_products.php');
}
?>