<?php
// Get the order to delete
$selected = filter_input(INPUT_POST, 'selected');

// Validate inputs
if ($selected == null || $selected == false) {
    $error = "No order was selected to be removed from database. Please try again.";
    include('error.php');
} else {
    require_once('database_admin.php');

    // delete the order from the database
    $query = 'DELETE FROM orders WHERE orderID = :selected';
    $statement = $db->prepare($query);
    $statement->bindValue(':selected', $selected);
    $statement->execute();
    $statement->closeCursor();

    // Display the list of orders
    include('list_all_orders.php');
}
?>