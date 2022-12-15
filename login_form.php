<!DOCTYPE html>
<html>
    <!-- The document's header with the metadata is in this section -->
    <head>
        <meta charset = "UTF-8"> <!-- Indicates the character set to use: UTF-8 -->
        <title>Login</title> <!-- This is the title of the web page -->
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
    <center> <!-- Used to center the header -->
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
				<li class="nav-item">
					<a class="nav-link" href="./index.php" id = "menuOptions">Home
						<span class="sr-only">(current)</span>
					</a>
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
					<a class="nav-link" href="./account.php" id = "menuOptions">Account</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="./about.php" id = "menuOptions">About Us</a>
				</li>
			</ul>
		</div>
	</nav>
        <strong> <!-- Used to make the header bold -->
            <h1>Welcome to Dino Store Account Login Page</h1>
        </strong>
        <main style = "width: 60%;">
            <form action="./login.php" method="post" id="login_form">
                <div class="form-group">
                    <h3 style = "text-align: center;">Login</h3>  
                </div> 
                <div class="form-group"> <!-- This is for the field for user name -->
                    <p style = "text-align: left;" for="userName">Username:</p>
                    <input type="text" class="form-control validate" id="userName" name="userName" placeholder="Username (No @ symbol)" maxLength = "40" required="true" autofocus="true">
                </div>
                <div class="form-group"> <!-- This is for the field for password -->
                    <p style = "text-align: left;" for="password">Password:</p>
                    <input type="password" class="form-control validate" id="password" name="password" placeholder="Password" required="true" maxLength = "255" autocomplete="off">
                </div>
                <button type="submit" class="btn btn-success">Login</button>
                <button type="reset" class="btn btn-danger">Clear</button>
                <br> <!-- Line break -->
                <br> <!-- Line break -->
                <div class="form-group"> <!-- This is for the register button -->
                    <i> <!-- Used to italicize the paragraph -->
                        <p style="margin: 0; padding: 0; line-height: 20px;">Not a user? Click the register button below to create an account.</p>
                    </i>
                    <br> <!-- Line break -->
                    <button type="button" class="btn btn-primary" onclick="location.href = './register_form.php';">Register</button>
                </div>
            </form>
        </main>
    </center> 
    <p><a href="./index.php">Go back to Dino Store Home</a></p>
    <!-- The footer section -->
    <footer>
        <hr color = "orange"> <!-- Orange Horizontal Line -->
        <p style = "text-align: right;">&copy; <?php echo date("Y"); ?> Dino Store</p>
    </footer>
</html>
