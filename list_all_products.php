<?php 
session_start();
if (!isset($_SESSION['user'])) {
	$error = "Not logged into admin account.";
	include("error.php");
}
else if (($_SESSION['user']['isAdmin'] == false) || ($_SESSION['user']['isAdmin'] == null))
{
	$error = "You do not have access to this page.";
	include("error.php");
}
else {
?>
<!DOCTYPE html>
<html>
    <!-- The head section -->
    <head> <!-- The document's header with the metadata is in this section -->
        <meta charset = "UTF-8"> <!-- Indicates the character set to use: UTF-8 -->
        <title>Dino Store All Products</title> <!-- This is the title of the web page -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
		</style>
    </head> <!-- End of document head -->
    <!-- The body section -->
    <body>
		<!-- NAVBAR STARTING -->
		<!-- Use navbar class to the navbar logo to the far left of the screen-->
		<nav class = "navbar navbar-expand-lg navbar-light bg-dark fixed-top py-lg-0 ">
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
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link" href="./admin.php" id = "menuOptions">Admin Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="./list_all_orders.php" id = "menuOptions">All Orders</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="./list_all_products.php" id = "menuOptions">All Products</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="./list_all_users.php" id = "menuOptions">All Users</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="./account.php" id = "menuOptions">Account</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="./logout.php" id = "menuOptions">Logout</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="./about.php" id = "menuOptions">About Us</a>
					</li>
				</ul>
			</div>
		</nav>
        <center>
            <?php
                require_once('database_admin.php'); # connect to the database
                $count = 0; # used to store how many results came up
                $query = 'SELECT * FROM products';
                $statement = $db->prepare($query);
                $statement->execute();
                $products = $statement->fetchAll();
                $statement->closeCursor();
            ?>
            <table border = "1">
                <caption>All Dino Store Products</caption>
                <tr>
                    <th>Product Image</th>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product Description</th>
                </tr>
                <?php foreach ($products as $product) : ?>
                <tr>
                    <?php $count += 1; ?>
                    <td><img style = "height: 150px; width: 150px;" src = "<?php echo $product['productImage']; ?>" alt = "<?php echo $product['productName']; ?>"></td> <!-- This displays the product image -->
                    <td><?php echo $product['productID']; ?></td> <!-- This displays the product ID number -->
                    <td><?php echo $product['productName']; ?></td> <!-- This displays the product name -->
                    <td>$<?php echo $product['productPrice']; ?></td> <!-- This displays the product price -->
                    <td><?php echo $product['productDescription']; ?></td> <!-- This displays the product description -->
                </tr>
                <?php endforeach; ?>
            </table>
            <p>There is/are <?php echo $count?> total product(s).</p>
            <p>Thank you for using the Dino Store Admin Page.</p>
		</center>
        <!-- The footer section -->
        <footer>
            <hr color = "orange"> <!-- Orange Horizontal Line -->
            <p style = "text-align: right;">&copy; <?php echo date("Y"); ?> Dino Store</p>
        </footer>
    </body>
</html>
<?php } ?>