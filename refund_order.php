<?php
// Get the order to delete
$selected = filter_input(INPUT_POST, 'selected');

// Validate inputs
if ($selected == null || $selected == false) {
    $error = "No order was selected to be refunded. Please try again.";
    include('error.php');
} else {
    require_once('database_admin.php');

    // refund the order in the database
    $query = 'UPDATE orders SET refunded = 1 WHERE orderID = :selected';
    $statement = $db->prepare($query);
    $statement->bindValue(':selected', $selected);
    $statement->execute();
    $statement->closeCursor();

    // Display the list of orders
    include('list_all_orders.php');
}
?>