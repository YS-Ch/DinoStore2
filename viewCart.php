<?php
session_start();
?>

<html>
<head>
<title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href=
"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
			rel="stylesheet" integrity=
"sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
			crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity=
"sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
			crossorigin="anonymous">
	</script>
	
	<script src=
"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
			integrity=
"sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
			crossorigin="anonymous">
	</script>

<style>
body{
color: orange;
text-align: center;
}
table, td, th{
text-align: center;
border: 1px solid orange;
  border-collapse: collapse;
}
input{
width: 50px;
text-align: center;
}

.theTotalCalc{
text-align: right;
float: right;
}
</style>
</head>

<body>
<div class = "container">
<form action = "<?php echo $_SERVER['PHP_SELF'];?>" method = "POST">
<p id = "emptiedCart"></p>
<?php $row = 0;?>
<table class = "bg-dark" id = "viewTheCart">
	
			// Description of the items that are going to be pruchased
			<th width = "30%">IMAGE</th>
			<th>NAME</th>
			<th>QUANTITY</th>
			<th>PRICE</th>
			<?php foreach($_SESSION['cart'] as $val) :?>
			<tr>
				<input type = "hidden" name = "countRows" value = "<?php echo $row ?>">
				<td><img src="<?php print_r($val[0]);?>" width = "50%"></td>
				<td><?php print_r($val[1]);?></td>
				<td><input type = "number" value = "<?php print_r($val[2]);?>"></td>
				<td>$<?php print_r($val[3]);?></td>
			</tr>
			<?php $row++;?>
			<?php endforeach;?>
	
	// Subtotal
<tr><td colspan = "4" style = "text-align: right;">Total: $<?php 
$subtotal = 0;
    foreach ($_SESSION['cart'] as $item) {
        $subtotal += $item['3'];
    }
    $subtotal_f = number_format($subtotal, 2);
	
echo $subtotal_f?></td></tr>
</table>

<br>
<input type = "submit" name = "action" class = "bg-dark" value = "Update" style = "width: 7%; color: orange;">
<br>
<input type = "submit" name = "action" value = "Delete Everything" style = "width: 15%; background-color: red; color: white;">
</form>
</div>
<script>
var numberRows = document.getElementById("viewTheCart").rows.length;
if(numberRows == 2)
{
document.getElementById("viewTheCart").style.display = "none";
  document.getElementById("emptiedCart").innerHTML = "Your cart is empty!";

}
</script>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  $event = $_POST['action'];

  if ($event == "Update") {


	  //Getting the total cost of the items
$addingToCart = array($imageURL, $name, $quantity, $thePrice);

//print_r($addingToCart[0]);

$_SESSION[$name] = $addingToCart;
}
 

elseif ($event == "Delete Everything") {
    // Initialize the session.
// If you are using session_name("something"), don't forget it now!
session_start();

// Unset all of the session variables.
$_SESSION = array();

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finally, destroy the session.
session_destroy();
  }

header("Location: viewCart.php");

}
?>

</body>
</html>
