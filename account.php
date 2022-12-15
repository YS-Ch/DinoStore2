<?php 
session_start();
if ($_SESSION['user']['userName'] == null) {
	$error = "Not logged into an account.";
	include("error.php");
}
else {
?>
<?php
# Create a formatting function
function formatPhone($phone){
      
    # Pass phone number in preg_match function
    if (preg_match('/^([0-9]{3})([0-9]{3})([0-9]{4})$/', $phone, $value)){  
        # Store value in format variable
        $format = ('+1-' . $value[1] . '-' . $value[2] . '-' . $value[3]);
    }
    # return and print the given format
    return $format;
} ?>
<!DOCTYPE html>
<html>
    <!-- The head section -->
    <head> <!-- The document's header with the metadata is in this section -->
	<style>
    body{
  padding-top: 55px;
}

#storeName, #menuOptions{
color: orange;
}

#barIcon{
background-color: orange;
}

li a{
text-align: center;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 12px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#searchOptions {
  list-style-type: none;
  padding: 0;
  margin: 0;
  display: none;
  width: 100%;
}

#searchOptions li a {
  border: 1px solid #ddd;
  margin-top: -1px; /* Prevent double borders */
  background-color: #f6f6f6;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  color: black;
  display: block;
}

#searchOptions li a:hover:not(.header) {
  background-color: #eee;
}

#categories{
        	position:relative;
  width:50%;
  height: 50%;
  padding-bottom:50%;
  border-radius:50%;
            background-color: grey;
            text-align: center;
            
            color: orange;
            font-size: 100%;
        }
 .centered{
        position: absolute;
  		top: 50%;
  		left: 50%;
  		transform: translate(-50%, -50%);
        color: orange;
        font-weight: 900;
  		}
  </style>
        <meta charset = "UTF-8"> <!-- Indicates the character set to use: UTF-8 -->
		<title>Account Details</title> <!-- This is the title of the web page -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head> <!-- End of document head -->
    <!-- The body section -->
	<main>
			<!-- NAVBAR STARTING -->
	<!-- Use navbar class to the navbar logo
		to the far left of the screen-->
		<nav class=" navbar navbar-expand-lg
		navbar-light bg-dark fixed-top py-lg-0 ">

		<a class="navbar-brand" href="./index.php" id = "storeName">DinoStore</a>
		
		<button class="navbar-toggler" type="button"
				data-toggle="collapse"
				data-target="#navbarResponsive"
				aria-controls="navbarResponsive"
				aria-expanded="false"
				aria-label="Toggle navigation"
				id = "barIcon">
				<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse"
				id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="./index.php" id = "menuOptions">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="products.php" id = "menuOptions">Shop</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="orderSummary.php" id = "menuOptions">Cart</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="./login_form.php" id = "menuOptions">Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="./logout.php" id = "menuOptions">Logout</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="./account.php" id = "menuOptions">Account</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="./about.php" id = "menuOptions">About Us</a>
				</li>
			</ul>
			</div>
		</nav>
</main>
    <body>
		<br>
		<center style = "padding-left: 50px; width: 95%;">
			<h2>Account Information</h2>
			<table border = "1">
				<tr>
                    <th style = "padding-left: 5px; padding-right: 5px; width: 15%;"> <!-- This displays the customer profile picture -->
                        <?php 
                            if ($_SESSION['user']['pfp'] == null) {
                                # do nothing
                            }
                            else { ?>
                                <img style = "height: 135px; width: 135px; border-radius: 50%;" src = "<?php echo $_SESSION['user']['pfp']; ?>" alt = "@<?php echo $_SESSION['user']['userName']; ?>">
                            <?php }
                        ?>
					</th>
					<td style = "padding-left: 10px;"> <!-- This displays the customer name -->
						<p style = "margin: 0; padding-top: 0; line-height: 20px; font-size: xx-large;">
							<strong>@<?php echo $_SESSION['user']['userName']; ?></strong>
						</p>
						<p style = "margin: 0; padding-top: 0; line-height: 35px; font-size: x-large;">
							<?php echo $_SESSION['user']['firstName'];?>&ThinSpace;<?php if($_SESSION['user']['middleName'] != null){echo $_SESSION['user']['middleName'];};?>&ThinSpace;<?php echo $_SESSION['user']['lastName'];?>
						</p>
						<br>
						<p style = "margin: 0; padding-top: 0; line-height: 20px; font-size: large;">
							<strong>Gender:</strong>&ThinSpace;&ThinSpace;<?php echo $_SESSION['user']['gender']; ?>
						</p>
						<p style = "margin: 0; padding-top: 0; line-height: 20px; font-size: large;">
							<strong>Date of Birth:</strong>&ThinSpace;&ThinSpace;<?php echo $_SESSION['user']['dob']; ?>
						</p>
					</td>
                </tr>
				<tr>
                    <th style = "padding-left: 10px; width: 15%;"> <!-- This displays the customer address -->
						<p style = "margin: 0; padding-top: 0; line-height: 20px;">
							<strong style = "font-size: large;">Address:</strong>
						</p>
					</th>
					<td style = "padding-left: 10px;">
						<p style = "margin: 0; padding: 0; line-height: 20px; font-size: large;"><?php echo $_SESSION['user']['street']; ?></p>
                    		<?php
                            	if ($_SESSION['user']['street2'] == null){
                                	# do nothing
                            	}
                            	else { ?>
                            	    <p style="margin: 0; padding: 0; line-height: 20px; font-size: large;"><?php echo $_SESSION['user']['street2']; ?></p>
                            	<?php }
                        	?>
                        <p style="margin: 0; padding: 0; line-height: 20px; font-size: large;"><?php echo $_SESSION['user']['city']; ?>,&ThinSpace;&ThinSpace;<?php echo $_SESSION['user']['states']; ?>&ThinSpace;&ThinSpace;<?php echo $_SESSION['user']['zipcode']; ?></p>
					</td>
                </tr>
				<tr>
                    <th style = "padding-left: 10px; width: 15%;"> <!-- This displays the customer contact info -->
						<p style = "margin: 0; padding-top: 0; line-height: 20px;">
							<strong style = "font-size: large;">Contact Info:</strong>
						</p>
					</th>
					<td style = "padding-left: 10px;"> 
						<p style = "margin: 0; padding-top: 0; line-height: 20px; font-size: large;"> <!-- This displays the email -->
							<strong>Email&ThinSpace;&ThinSpace;Address:&ThinSpace;&ThinSpace;</strong><?php echo $_SESSION['user']['email'];?>
						</p> 
						<p style = "margin: 0; padding-top: 0; line-height: 20px; font-size: large;"> <!-- This displays the phone number -->
							<strong>Phone&ThinSpace;&ThinSpace;Number:&ThinSpace;&ThinSpace;</strong><?php echo formatPhone($_SESSION['user']['phoneNum']);?>
						</p>
					</td>
                </tr>
				<?php if (($_SESSION['user']['isAdmin'] == true) || ($_SESSION['user']['isAdmin'] == "1")) { ?>
				<tr>
					<th style = "padding-left: 10px; width: 15%;">
						<p style = "margin: 0; padding-top: 0; line-height: 20px;">
							<strong>Is an Admin:</strong>&ThinSpace;&ThinSpace;True
						</p>
					</th>
					<td style = "padding-left: 10px;">
						<p style = "margin: 0; padding-top: 0; line-height: 20px; font-size: large;">
							<strong>Admin Portal:</strong>&ThinSpace;&ThinSpace;<a href="./admin.php">Open Admin Portal</a>
						</p>
					</td>
				</tr>			
				<?php } else {} ?>
			</table>
			<?php
                require_once('database.php'); # connect to the database
            	$counter = 0; # used to store how many results came up
            	$query = 'SELECT * FROM payments WHERE customerID = :customerID';
            	$statement = $db->prepare($query);
				$statement->bindValue(':customerID', $_SESSION['user']['customerID']);
            	$statement->execute();
                $payments = $statement->fetchAll();
            	$statement->closeCursor();
            ?>
			<br> <!-- Line Break -->
			<h3>Saved Payment Method(s)</h3>
			<?php if($payments != null) { ?>
				<?php include("creditCardFunctions.php"); ?>		
				<form>
				<table border = "1">
			<?php } else {} ?>
				<?php foreach($payments as $payment) {
					$counter += 1;?>
					<tr>
						<th tyle = "padding-left: 10px; width: 15%;">
							<input tyle = "padding-left: 20px;" type = "radio" name = "selectedPayment" value = "<?php echo $payment['cardID']; ?>">
						</th>
						<th style = "padding-left: 10px; width: 15%;">
							<?php if($payment['cardNickname'] == null) { ?>
								<p style = "margin: 0; padding-top: 0; line-height: 20px;">
									<strong>Card <?php echo ($counter);?></strong>
								</p>
							<?php } 
							else { ?>
								<p style = "margin: 0; padding-top: 0; line-height: 20px;">
									<strong><?php echo $payment['cardNickname'];?></strong>
								</p>
							<?php } ?>
								<img style = "height: 128px; width: 128px;" src = "<?php echo PaymentCard::getCardImage(PaymentCard::creditCardType($payment['cardNumber'])); ?>" alt = "<?php PaymentCard::getCardImage(PaymentCard::creditCardType($payment['cardNumber'])); ?>">
						</th>
						<td style = "padding-left: 10px;">
							<p style = "margin: 0; padding-top: 0; line-height: 20px; font-size: large;">
								<strong>Card Number:&ThinSpace;&ThinSpace;</strong><?php echo $payment['cardNumber']; ?>
							</p>
							<p style = "margin: 0; padding-top: 0; line-height: 20px; font-size: large;">
								<strong>CVV/CVC Number:&ThinSpace;&ThinSpace;</strong><?php echo $payment['cvc']; ?>
							</p>
							<p style = "margin: 0; padding-top: 0; line-height: 20px; font-size: large;">
								<strong>Expiration Date:&ThinSpace;&ThinSpace;</strong><?php echo $payment['expMonth']; ?>/<?php echo $payment['expYear']; ?>
							</p>
							<p style = "margin: 0; padding-top: 0; line-height: 20px; font-size: large;">
								<strong>Card Type:&ThinSpace;&ThinSpace;</strong><?php echo (PaymentCard::creditCardType($payment['cardNumber'])); ?>
							</p>
							<p style = "margin: 0; padding-top: 0; line-height: 20px; font-size: large;">
								<strong>Name on Card:&ThinSpace;&ThinSpace;</strong><?php echo $payment['nameOnCard']; ?>
							</p>
						</td>
					</tr>	
				<?php } ?>
			<?php if($payments != null) { ?>
				</table>
				<div>
					<br> <!-- Line break -->
					<button type = "button" class="btn btn-primary" onclick="location.href = './add_payment_form.php';">Add Payment Method</button>
					<input type = "submit" class="btn btn-warning" name = "submit" id = "submit" value = "Delete Payment Method"> <!-- This button is used to submit the completed form -->
                    <input type = "reset" class="btn btn-danger" name = "reset" id = "reset" value = "Clear Fields"> <!-- This button is used to clear any information currently entered into the form -->
				</div>
				</form>
			<?php } 
			else { ?>
				<br> <!-- Line break -->
				<button type="button" class="btn btn-primary" onclick="location.href = './add_payment_form.php';">Add Payment Method</button>
			<?php } ?>
			<br> <!-- Line Break -->
			<?php
                require_once('database.php'); # connect to the database
            	$query2 = 'SELECT * FROM orders WHERE customerID = :customerID';
            	$statement2 = $db->prepare($query2);
				$statement2->bindValue(':customerID', $_SESSION['user']['customerID']);
            	$statement2->execute();
                $orders = $statement2->fetchAll();
            	$statement2->closeCursor();
            ?>
			<?php if($orders != null) { ?>
				<br> <!-- Line Break -->		
				<h3>Order History</h3>
				<form>
					<table border = "1">
						<tr>
							<th style = "padding-left: 10px; width: 15%;">Order to View</th>
							<th style = "padding-left: 10px; width: 15%;"><strong>Order ID</strong></th>
							<th style = "padding-left: 10px; width: 15%"><strong>Order Date</strong></th>
							<th style = "padding-left: 10px; width: 15%"><strong>Total Cost</strong></th>
						</tr>
			<?php } else {} ?>
			<?php foreach($orders as $order) { ?>
						<tr>
							<td style = "padding-left: 10px;">
								<input type = "radio" name = "selectedOrder" value = "<?php echo $order['orderID']; ?>">
							</td>
							<td style = "padding-left: 10px;"><?php echo $order['orderID']; ?></td>
							<td style = "padding-left: 10px;"><?php echo $order['date']; ?></td>
							<td style = "padding-left: 10px;">$<?php echo $order['totalCost']; ?></td>
						</tr>
			<?php } ?>
			<?php if($orders != null) { ?>
					</table>
					<br> <!-- Line Break -->
					<div>
						<input type = "submit" class="btn btn-success" name = "submit" id = "submit" value = "View Order Details"> <!-- This button is used to submit the completed form -->
                        <input type = "reset" class="btn btn-danger" name = "reset" id = "reset" value = "Clear Fields"> <!-- This button is used to clear any information currently entered into the form -->
					</div>
				</form>
			<?php } else {} ?>
		</center>
	</body>
	<!-- The footer section -->
	<footer>
        <hr color = "orange"> <!-- Orange Horizontal Line -->
        <p style = "text-align: right;">&copy; <?php echo date("Y"); ?> Dino Store</p>
    </footer>
</html>
<?php } ?>