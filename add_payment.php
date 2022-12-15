<?php 
session_start();
if ($_SESSION['user']['userName'] == null) {
	$error = "Not logged into an account.";
	include("error.php");
}
?>
<?php
include("creditCardFunctions.php");
// Get the card data
$cardNickname = filter_input(INPUT_POST, 'cardNickname');
$cardNumber = filter_input(INPUT_POST, 'cardNum');
$cardType = PaymentCard::creditCardType($cardNumber);
$nameOnCard = filter_input(INPUT_POST, 'nameOnCard');
$expMonth = filter_input(INPUT_POST, 'expMonth');
$expYear = filter_input(INPUT_POST, 'expYear');
$cvc = filter_input(INPUT_POST, 'cvc');
$customerID = $_SESSION['user']['customerID'];

// Validate inputs
	if(PaymentCard::validCreditCard($cardNumber, $cvc, (PaymentCard::creditCardType($cardNumber))) == false)
	{
		$error = "Card is invalid. Please try again.";
		include("error.php");
	}

    require_once('database_admin.php');

	$connection = mysqli_connect($host, $username, $password, $database);
	 
	// Add the payment card to the database
	$query7 = ', ';
    $query6 = 'INSERT INTO payments (cvc, expMonth, expYear, cardNumber, cardType, nameOnCard, cardNickname, customerID) VALUES (' . $cardNickname . $query7 .  $expMonth . $query7 . $expYear . $query7 . $cardNumber . $query7 . $cardType . $query7 . $nameOnCard . $query7 . $cardNickname . $query7 . $customerID . ');';
    $statement6 = mysqli_query($connection, $query6);

    // Display the homepage page
    include('index.php');
?>