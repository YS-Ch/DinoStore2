<?php
// Get the product to remove
$selected = filter_input(INPUT_POST, 'selected');

// Validate inputs
if ($selected == null || $selected == false) {
    $error = "No product was selected to be removed from database. Please try again.";
    include('error.php');
} else {
    require_once('database_admin.php');

    // delete the product from the database  
    $query = 'DELETE FROM products WHERE productID = :selected';
    $statement = $db->prepare($query);
    $statement->bindValue(':selected', $selected);
    $statement->execute();
    $statement->closeCursor();

    // Display the product list
    include('list_all_products.php');
}
?>