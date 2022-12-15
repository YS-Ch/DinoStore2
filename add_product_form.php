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
        <title>Dino Store Product Management</title> <!-- This is the title of the web page -->
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
        <!-- The main section -->
        <center>
            <h1>Add a New Product</h1>
            <!-- The form section -->
            <form action = "./add_product.php" method = "post" id = "add_product_form">
                <table border = "0" cellspacing = "1"> <!-- The table has 1 cell spacing and no borders -->
                    <!-- The table's body starts here -->
                    <tbody> 
                        <!-- Row 1 of the table -->
                        <tr> <!-- This is for the field for the product name -->
                            <!-- Column 1 of Row 1 of the table -->
                            <th style = "font-size: 16pt; text-align: left; font-weight: normal;">Product Name:</th> 
                            <!-- Column 2 of Row 1 of the table -->
                            <td> <!-- The room number field is autofoucsed and ready for information to be entered as soon as the page laods-->
                                <input type = "text" name = "productName" id = "productName" size = "35" maxlength = "100" required = "true"> 
                            </td> 
                        </tr>
                        <!-- Row 2 of the table -->
                        <tr> <!-- This is for the field for the product description -->
                            <!-- Column 1 of Row 2 of the table -->
                            <th style = "font-size: 16pt; text-align: left; font-weight: normal;">Product Description:</th>
                            <!-- Column 2 of Row 2 of the table -->
                            <td>
                                <textarea name = "productDescription" id = "productDescription" rows = "6" cols = "35" maxLength = "1000">Enter product description here.</textarea>
                            </td>
                        </tr>
                        <!-- Row 3 of the table -->
                        <tr> <!-- This is for the field for the product price -->
                            <!-- Column 1 of Row 3 of the table -->
                            <th style = "font-size: 16pt; text-align: left; font-weight: normal;">Product Price:</th>
                            <!-- Column 2 of Row 3 of the table -->
                            <td>
                                <input type = "number" name = "productPrice" id = "productPrice" size = "35" min = "0" max = "100000" required = "true">
                            </td>
                        </tr>
                        <!-- Row 4 of the table -->
                        <tr> <!-- This is for the field for the product image url -->
                            <!-- Column 1 of Row 4 of the table -->
                            <th style = "font-size: 16pt; text-align: left; font-weight: normal;">Product Image URL:</th>
                            <!-- Column 2 of Row 4 of the table -->
                            <td>
                                <input type = "url" name = "productImage" id = "productImage" size = "35" maxlength = "1000" required = "true">
                            </td>
                        </tr>
                        <!-- Row 5 of the table -->
                        <tr>
                            <!-- Column 1 of Row 5 of the table -->
                            <th style = "font-size: 16pt; text-align: left; font-weight: normal;"> <!-- This column is used to hold the forms submit and clear buttons -->
                                <input type = "submit" class="btn btn-success" name = "submit" id = "submit" value = "Add Product"> <!-- This button is used to submit the completed form -->
                                <input type = "reset" class="btn btn-danger" name = "reset" id = "reset" value = "Clear Fields"> <!-- This button is used to clear any information currently entered into the form -->
                            </th>
                            <!-- Column 2 of Row 5 of the table -->
                            <td></td> <!-- This column is empty -->
                        </tr>
                    </tbody> <!-- End of Table Body -->
                </table> <!-- End of Table -->
            </form> <!-- End of Form -->
        </center>
        <!-- The footer section -->
        <footer>
            <hr color = "orange"> <!-- Orange Horizontal Line -->
            <p style = "text-align: right;">&copy; <?php echo date("Y"); ?> Dino Store</p>
        </footer>
    </body>
</html>
<?php } ?>