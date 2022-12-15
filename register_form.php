<!DOCTYPE html>
<html>
    <!-- The document's header with the metadata is in this section -->
    <head>
        <meta charset = "UTF-8"> <!-- Indicates the character set to use: UTF-8 -->
        <title>Register</title> <!-- This is the title of the web page -->
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
    <!-- The body of the document starts here -->
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
		<center> <!-- Used to center the header -->
            <strong> <!-- Used to make the header bold -->
                <h1>Welcome to Dino Store Account Registration Page</h1>
            </strong>
        </center> <!-- End of the center block -->
        <div class="container"> <!-- This div is used to hold all the login form fields -->
            <!-- This section contains all the form fields-->
            <form action="./register.php" method="post" oninput="validateForm()" id = "register_form" enctype="multipart/form-data">
                <div class="form-group">
                    <h4>Profile Picture</h4>  
                </div> 
                <div class="form-group"> <!-- This is for the field for profile picture -->
                    <label for="file">Profile Picture:</label>
                    <input type="file" class="form-control validate" id="file" name="file">
					<input type="hidden" class="form-control validate" id="pfp" name="pfp" value="">
                </div>
				<script type="text/javascript">
					// Be aware! We are handling only the first <input type="file" /> element
					// To avoid errors, it should be placed before this piece of code
					var input = document.querySelector('input[type=file]');

					input.onchange = function () {
  						var file = input.files[0],
    					reader = new FileReader();

  						reader.onloadend = function () {
    						var b64 = reader.result;
    						console.log(b64);
							document.getElementById("pfp").value = b64;
  							};
  						reader.readAsDataURL(file);
					};
				</script>
                <div class="form-group">
                    <h4>Name</h4>  
                </div> 
                <div class="form-group"> <!-- This is for the field for first name -->
                    <label for="firstName">First Name:</label>
                    <input type="text" class="form-control validate" id="firstName" name="firstName" placeholder="First Name" maxLength = "60" required="true" autofocus="on">
                </div>
                <div class="form-group"> <!-- This is for the field for middle name -->
                    <label for="middleName">Middle Name:</label>
                    <input type="text" class="form-control" id="middleName" name="middleName" placeholder="Middle Name (optional)" maxLength = "60">
                </div>
                <div class="form-group"> <!-- This is for the field for last name -->
                    <label for="lastName">Last Name:</label>
                    <input type="text" class="form-control validate" id="lastName" name="lastName" placeholder="Last Name" maxLength = "60" required="true">
                </div>
                <div class="form-group">
                    <h4>Personal Information</h4>  
                </div> 
                <div class="form-group"> <!-- This is for the field for date of birth -->
                    <label for="dob">Date of Birth:</label>
                    <input type="date" class="form-control validate" id="dob" name="dob" required="true">
                </div>
                <div class="form-group"> <!-- This is for the field for gender -->
                    <label for="gender">Gender:</label>
                    <select class="form-control" name = "gender" id = "gender">
                        <option selected = "true" value = "Not Provided">Optional</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <h4>Address</h4>  
                </div> 
                <div class="form-group"> <!-- This is for the field for address line 1 -->
                    <label for="street">Address Line 1:</label>
                    <input type="text" class="form-control validate" id="street" name="street" placeholder="Street (Address Line 1)" maxLength = "255" required="true">
                </div>
                <div class="form-group"> <!-- This is for the field for address line 1 -->
                    <label for="street2">Address Line 2:</label>
                    <input type="text" class="form-control validate" id="street2" name="street2" placeholder="Address Line 2" maxLength = "255">
                </div>
                <div class="form-group"> <!-- This is for the field for city -->
                    <label for="city">City:</label>
                    <input type="text" class="form-control validate" id="city" name="city" placeholder="City" maxLength = "255" required="true">
                </div>
                <div class="form-group"> <!-- This is for the field for zip/postal code -->
                    <label for="zipcode">Postal Code:</label>
                    <input type="text" class="form-control validate" id="zipcode" name="zipcode" placeholder="XXXXX or XXXXX-XXXX" format = "\d{5,5}(-\d{4,4})?" minLength = "5" maxLength = "10" required="true">
                </div>
                <div class="form-group"> <!-- This is for the field for state -->
                    <label for="state">State:</label>
                    <select name = "state" id = "state" class="form-control validate" required = "true">
                        <option disabled = "true" selected = "true">Choose a State</option>
                        <option value="AK">AK</option>
                        <option value="AL">AL</option>
                        <option value="AR">AR</option>
                        <option value="AZ">AZ</option>
                        <option value="CA">CA</option>
                        <option value="CO">CO</option>
                        <option value="CT">CT</option>
                        <option value="DC">DC</option>
                        <option value="DE">DE</option>
                        <option value="FL">FL</option>
                        <option value="GA">GA</option>
                        <option value="HI">HI</option>
                        <option value="IA">IA</option>
                        <option value="ID">ID</option>
                        <option value="IL">IL</option>
                        <option value="IN">IN</option>
                        <option value="KS">KS</option>
                        <option value="KY">KY</option>
                        <option value="LA">LA</option>
                        <option value="MA">MA</option>
                        <option value="MD">MD</option>
                        <option value="ME">ME</option>
                        <option value="MI">MI</option>
                        <option value="MN">MN</option>
                        <option value="MO">MO</option>
                        <option value="MS">MS</option>
                        <option value="MT">MT</option>
                        <option value="NC">NC</option>
                        <option value="ND">ND</option>
                        <option value="NE">NE</option>
                        <option value="NH">NH</option>
                        <option value="NJ">NJ</option>
                        <option value="NM">NM</option>
                        <option value="NV">NV</option>
                        <option value="NY">NY</option>
                        <option value="OH">OH</option>
                        <option value="OK">OK</option>
                        <option value="OR">OR</option>
                        <option value="PA">PA</option>
                        <option value="RI">RI</option>
                        <option value="SC">SC</option>
                        <option value="SD">SD</option>
                        <option value="TN">TN</option>
                        <option value="TX">TX</option>
                        <option value="UT">UT</option>
                        <option value="VA">VA</option>
                        <option value="VT">VT</option>
                        <option value="WA">WA</option>
                        <option value="WI">WI</option>
                        <option value="WV">WV</option>
                        <option value="WY">WY</option>
                    </select> 
                </div>
                <div class="form-group">
                    <h4>Contact information</h4>  
                </div> 
                <div class="form-group"> <!-- This is for the field for email -->
                    <label for="email">Email:</label>
                    <input type="email" class="form-control validate" id="email" name="email" placeholder="email@example.com" maxLength = "255" required="true">
                </div>
                <div class="form-group"> <!-- This is for the field for email confirmation -->
                    <label for="email2">Confirm Email:</label>
                    <input type="email2" class="form-control validate" id="email2" name="email2" placeholder="email@example.com" maxLength = "255" required="true">
                </div>
                <div class="form-group"> <!-- This is for the field for phone number -->
                    <label for="phoneNum">Phone Number:</label>
                    <input type="tel" class="form-control validate" id="phoneNum" name="phoneNum" placeholder="5555555555" minLength = "10" maxLength = "10" required="true">
                </div>
				<div class="form-group">
                    <h4>Account Information</h4>  
                </div> 
                <div class="form-group"> <!-- This is for the field for user name -->
                    <label for="userName">Username:</label>
                    <input type="text" class="form-control validate" id="userName" name="userName" placeholder="Username (No @ symbol)" maxLength = "40" required="true" autocomplete="off">
                </div>
                <div class="form-group">
                    <h4>Password</h4>  
                </div>  
                <div class="form-group"> <!-- This is for the field for password -->
                    <label for="pword">Password:</label>
                    <input type="password" class="form-control validate" id="pword" name="pword" placeholder="Password" required="true" maxLength = "255" autocomplete="off">
                </div>
                <div class="form-group"> <!-- This is for the field for password -->
                    <label for="pword2">Confirm Password:</label>
                    <input type="password" class="form-control validate" id="pword2" name="pword2" placeholder="Password" required="true" maxLength = "255" autocomplete="off">
                </div>
                <button type="submit" class="btn btn-success">Register Account</button>
                <button type="reset" class="btn btn-danger">Clear Form</button>
            </form> <!-- End of Form -->
        </div> <!-- End of Main div -->
        <br> <!-- Line break -->
        <p><a href="./index.php">Go back to Dino Store Home</a></p>
		<script type = "text/javascript" name = "validateForm" id = "validateForm">
            function validateForm() {
                pword.setCustomValidity(pword.value != pword2.value ? "Passwords do not match." : "");
                pword2.setCustomValidity(pword2.value != pword.value ? "Passwords do not match." : "");
                email.setCustomValidity(email.value != email2.value ? "Email addresses do not match." : "");
                email2.setCustomValidity(email2.value != email.value ? "Email addresses do not match." : "");
            }
        </script>
        <!-- The footer section -->
        <footer>
            <hr color = "orange"> <!-- Orange Horizontal Line -->
            <p style = "text-align: right;">&copy; <?php echo date("Y"); ?> Dino Store</p>
        </footer>
    </body> <!-- End of Body -->
</html>
<!-- End of document -->