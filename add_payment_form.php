<?php 
session_start();
if ($_SESSION['user']['userName'] == null) {
	$error = "Not logged into an account.";
	include("error.php");
}
else {
?>
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
				<li class="nav-item active">
					<a class="nav-link" href="./index.php" id = "menuOptions">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#" id = "menuOptions">Shop</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#" id = "menuOptions">Cart</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="./login_form.php" id = "menuOptions">Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="./logout.php" id = "menuOptions">Logout</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="./account.php" id = "menuOptions">Account</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="./about.php" id = "menuOptions">About Us</a>
				</li>
			</ul>
			</div>
		</nav>
	</main>
	<center>
		<form style = "width: 60%;" action="./add_payment.php" method="post" id = "add_payment_form">
			<div class="form-group">
                <h1>Add a New Payment Method</h1>   
			</div>
            <div class="form-group"> <!-- This is for the field for card number -->
                <p style = "text-align: left;" for="cardNum">Card Number:</p>
                <input type="text" onkeyup="$cc.validate(event)" class="form-control validate" id="cardNum" name="cardNum" placeholder="Card Number" maxLength = "20" required="true" autofocus="true" autocomplete="off">            
			</div>
			<div class="form-group"> <!-- This is for the field for cvc -->
                <p style = "text-align: left;" for="cvc">Security Code:</p>
                <input type="text" class="form-control validate" id="cvc" name="cvc" placeholder="Security Code" required="true" minLength = "3" maxLength = "4" autocomplete="off">
            </div>
			<div class="form-group"> <!-- This is for the field for expiration month -->
                <p style = "text-align: left;" for="expMonth">Expiration Month:</p>
                <input type="text" class="form-control validate" id="expMonth" name="expMonth" placeholder="Expiration Month" required="true" minLength = "1" maxLength = "2" autocomplete="off">
            </div>
			<div class="form-group"> <!-- This is for the field for expiration year -->
                <p style = "text-align: left;" for="expYear">Expiration Year:</p>
                <input type="text" class="form-control validate" id="expYear" name="expYear" placeholder="Expiration Year" required="true" minLength = "4" maxLength = "4" autocomplete="off">
            </div>
			<div class="form-group"> <!-- This is for the field for card holder name -->
                <p style = "text-align: left;" for="nameonCard">Name on Card:</p>
                <input type="text" class="form-control validate" id="nameonCard" name="nameonCard" placeholder="Name on Card" required="true" maxLength = "255" autocomplete="off">
            </div>
			<div class="form-group"> <!-- This is for the field for nickname for payment method -->
                <p style = "text-align: left;" for="cardNickname">Payment Method Nickname:</p>
                <input type="text" class="form-control validate" id="cardNickname" name="cardNickname" placeholder="Payment Method Nickname" required="true" minLength = "1" maxLength = "255" autocomplete="off">
            </div>
			<div class="form-group">
				<br> <!-- Line break -->
                <button type="submit" class="btn btn-success">Add Payment Method</button>
                <button type="reset" class="btn btn-danger">Clear</button>
                <br> <!-- Line break -->
			</div>
                </form>
		</center>
	</body>
	<!-- The footer section -->
	<footer>
    	<hr color = "orange"> <!-- Orange Horizontal Line -->
    	<p style = "text-align: right;">&copy; <?php echo date("Y"); ?> Dino Store</p>
	</footer>
</html>
<?php } ?>