<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <!-- The head section -->
    <head> <!-- The document's header with the metadata is in this section -->
        <meta charset = "UTF-8"> <!-- Indicates the character set to use: UTF-8 -->
        <title>Dino Store About Us Page</title> <!-- This is the title of the web page -->
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
				
			// Options in about us
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
				<li class="nav-item">
					<a class="nav-link" href="orderSummary.php" id = "menuOptions">Cart</a>
				</li>
				<li class="nav-item">
                                        <a class="nav-link" href="<?php if (empty($_SESSION['user'])) { echo './login_form.php'; } else{echo './logout.php';}?>" id = "menuOptions"><?php if (empty($_SESSION['user'])) { echo 'Login'; } else{echo 'Logout';}?></a>
				</li>                               
				<li class="nav-item">
					<a class="nav-link" href="account.php" id = "menuOptions">Account</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="about.php" id = "menuOptions">About Us<span class="sr-only">(current)</span></a>
				</li>
			</ul>
		</div>
	</nav>
        <!-- The main section -->
        <main>
            <center>
                <h1>About Us</h1>
                <p>A lot of people don’t know the difference between paleontology and archaeology.  Paleontology is the study of extinct animals, while archaeology studies how people used to live through artifacts. We want to narrow that gap in understanding. Our purpose is to encourage and indulge kids in paleontology. So we made dinosaur toys for kids under the age of 10 years. Of course, paleontology isn’t just about dinosaurs, as Siri’s Paleontologist grandfather stressed many times.  But this is a starting point.</p>
            </center>
        </main>
        <!-- The footer section -->
        <footer>
            <hr color = "orange"> <!-- Orange Horizontal Line -->
            <p style = "text-align: right;">&copy; <?php echo date("Y"); ?> Dino Store</p>
        </footer>
    </body>
</html>
