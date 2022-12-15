<?php
// Get the card to delete
$selectedPayment = filter_input(INPUT_POST, 'selected');

// Validate inputs
if ($selectedPayment == null || $selectedPayment == false) {
    $error = "No payment method was selected to be removed from account. Please try again.";
    include('error.php');
} else {
    require_once('database_admin.php');

    // delete the card from the database
    $query = 'DELETE FROM payments WHERE cardID = :selected';
    $statement = $db->prepare($query);
    $statement->bindValue(':selected', $selected);
    $statement->execute();
    $statement->closeCursor();

    // Display the account page
    include('account.php');
}
?>