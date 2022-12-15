<!DOCTYPE html>
<html>
<head>
    <title>My Guitar Shop</title>
    <link rel="stylesheet" type="text/css" href="main.css">
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
    <!--<link rel="stylesheet" type="text/css" href="main.css" />-->
	<style>
body{
color: orange;
padding-top: 60px;
  background-size: auto;
			text-align: center;
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

table{
    width: 50%;
  height: 50%;
  
}
table, td, th{
text-align: center;
border: 1px solid orange;
  border-collapse: collapse;
  
}
input[type='number']{
width: 50px;
text-align: center;
}
input[type = 'submit']{
    color: orange;
    border-radius: 10%;
    background-color: #343a40;
    font-weight: bold;
}
</style>
</head>
<body>
    <!-- NAVBAR STARTING -->
	<!-- Use navbar class to the navbar logo
		to the far left of the screen-->
	<nav class=" navbar navbar-expand-lg
		navbar-light bg-dark fixed-top py-lg-0 ">
		<a class="navbar-brand" href="#" id = "storeName">DinoStore</a>
		
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
				<li class="nav-item ">
					<a class="nav-link" href="index.php" id = "menuOptions">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="products.php" id = "menuOptions">Shop</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="orderSummary.php" id = "menuOptions">Cart<span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
                                        <a class="nav-link" href="<?php if (empty($_SESSION['user'])) { echo './login_form.php'; } else{echo './logout.php';}?>" id = "menuOptions"><?php if (empty($_SESSION['user'])) { echo 'Login'; } else{echo 'Logout';}?></a>
				</li>                               
				<li class="nav-item">
					<a class="nav-link" href="account.php" id = "menuOptions">Account</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="about.php" id = "menuOptions">About Us</a>
				</li>
			</ul>
		</div>
	</nav>

    <div class="container-fluid">
      
	<center>
	  <h2>Your Cart</h2>
        
        <?php if (empty($_SESSION['cart']) || 
                  count($_SESSION['cart']) < 1) : ?>
            <p>There are no items in your cart.</p>
        <?php else: ?>
            <form action="serverIndex.php" method="POST">
            <!--<input type="hidden" name="action" value="update">-->
            <table class = "bg-dark">
                <tr id="cart_header">
                    <th class="left">Item</th>
                    <th class="right">Item Cost</th>
                    <th class="right">Quantity</th>
                    <th class="right">Item Total</th>
                </tr>

            <?php foreach( $_SESSION['cart'] as $key => $item ) :
                $cost  = number_format($item['cost'],  2);
                $total = number_format($item['total'], 2);
            ?>
                <tr>
                    <td>
                        <?php echo $item['name']; ?>
                    </td>
                    <td class="right">
                        $<?php echo $cost; ?>
                    </td>
                    <td class="right">
                        <input type="number" min = "0" class="cart_qty"
                            name="newqty[<?php echo $key; ?>]"
                            value="<?php echo $item['qty']; ?>">
                    </td>
                    <td class="right">
                        $<?php echo $total; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
                <tr id="cart_footer">
                    <td colspan="3"><b>Subtotal</b></td>
                    <td>$<?php echo get_subtotal(); ?></td>
                </tr>
                <tr>
                    <td colspan="4" class="right">
                        <input type="submit" name = "action" value="Update">
                        <p>Click "Update Cart" to update quantities in your
                cart. Enter a quantity of 0 to remove an item.
            </p>
                    </td>
                </tr>
            </table>
            <br>
            <input type = "submit" name = "action" value = "Continue Shopping">
        <input type = "submit" name = "action" value = "Clear Cart">
        </form>
        <?php endif; ?>
        </center>
        <br>
            <form action = "landingpage.jpg" method = "POST">
                
            <div class="container-fluid"> <!-- This is for the field for card number -->
                <h4>Payment Information</h4>
                <input type="text" name="cardNum" placeholder="Card Number" width = "100%" required="true" autofocus="true" autocomplete="off">            
                <input type="month" name="expMonth" placeholder="Expiration Month" width = "100%" required="true" autocomplete="off">            
                <input type="text" id="cvv" name="cvv" placeholder="Security Code" required="true" mixLength = "3" maxLength = "4" autocomplete="off">
                <input type="submit" class="btn btn-success" value = "Add Payment Method">
                <input type="reset" class="btn btn-danger" value ="Clear">
            </form>
                <p style = "text-align: right;">&copy; <?php echo date("Y"); ?> Dino Store</p>
</body>
</html>