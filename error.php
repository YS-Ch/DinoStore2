<!DOCTYPE html>
<html>
    <!-- The head section -->
    <head> <!-- The document's header with the metadata is in this section -->
        <meta charset = "UTF-8"> <!-- Indicates the character set to use: UTF-8 -->
        <title>Dino Store Error</title> <!-- This is the title of the web page -->
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
				
				<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse"
				id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
					<a class="nav-link" href="./index.php" id = "menuOptions">Home
						<span class="sr-only">(current)</span>
					</a>
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
					<a class="nav-link" href="./account.php" id = "menuOptions">Account</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="./about.php" id = "menuOptions">About Us</a>
				</li>
			</ul>
		</div>
	</nav>
        <!-- The main section -->
        <main>
            <h2>Error</h2>
            <p><?php echo $error; ?></p>
        </main>
        <!-- The footer section -->
        <footer>
            <hr color = "orange"> <!-- Orange Horizontal Line -->
            <p style = "text-align: right;">&copy; <?php echo date("Y"); ?> Dino Store</p>
        </footer>
    </body>
</html>