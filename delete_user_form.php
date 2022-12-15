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
        <meta charset = "UTF-8"> <!-- Indicates the character set to use: UTF-8 -->
        <title>Dino Store Remove User Accounts</title> <!-- This is the title of the web page -->
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
            <h1>Delete an User Account</h1>
            <?php
                require_once('database_admin.php'); # connect to the database
                $count = 0; # used to store how many results came up
                $query = 'SELECT * FROM accounts';
                $statement = $db->prepare($query);
                $statement->execute();
                $accounts = $statement->fetchAll();
                $statement->closeCursor();
                $true = 'True';
                $false = 'False';
                $unknown = 'Unknown';
            ?>
            <!-- The form section -->
            <form onsubmit = "if(!confirm('Are you sure you want to delete this user account? This action cannot be undone.')){return false;}" action = "./delete_user.php" method = "post" id = "delete_user_form">
                <p>Select an account to delete below using the radio buttons.</p>
                <table border = "1">
                    <caption>All Dino Store User Accounts</caption>
                    <tr>
                        <th>&ThinSpace;</th>
                        <th>Customer ID</th>
						<th>Profile Picture</th>
                        <th>Username</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Date of Birth</th>
						<th>Is Admin?</th>
                    </tr>
                    <?php foreach ($accounts as $account) { 
					if (($account['isAdmin'] == false) || ($account['isAdmin'] == false)) { ?>
                    <tr>
                        <?php $count += 1; ?>
                        <td><input type = "radio" name = "selected" value = "<?php echo $account['customerID']; ?>" required = "true"></td>
                        <td><?php echo $account['customerID']; ?></td> <!-- This displays the customer ID number -->
						<td> <!-- This displays the customer profile picture -->
                        	<?php 
                            	if ($account['pfp'] == null) {
	                                # do nothing
    	                        }
        	                    else { ?>
            	                    <img style = "height: 100px; width: 100px; border-radius: 50%;" src = "<?php echo $account['pfp']; ?>" alt = "@<?php echo $account['userName']; ?>">
                	            <?php }
                    	    ?>
                    	</td> 
						<td>@<?php echo $account['userName']; ?></td> <!-- This displays the customer username -->
                        <td><?php echo $account['firstName']; ?></td> <!-- This displays the customer first name -->
                        <td> <!-- This displays the customer middle name -->
                            <?php 
                                if ($account['middleName'] == null) {
                                    # do nothing
                                }
                                else {
                                    echo $account['middleName'];
                                }
                            ?>
                        </td>
                        <td><?php echo $account['lastName']; ?></td> <!-- This displays the customer last name -->
                        <td><?php echo $account['gender']; ?></td> <!-- This displays the customer gender -->
						<td> <!-- This displays the customer address -->
                            <p style = "margin: 0; padding: 0; line-height: 20px;"><?php echo $account['street']; ?></p>
                            <?php
                                if ($account['street2'] == null){
                                    # do nothing
                                }
                                else { ?>
                                    <p style="margin: 0; padding: 0; line-height: 20px;"><?php echo $account['street2']; ?></p>
                                <?php }
                            ?>
                            <p style="margin: 0; padding: 0; line-height: 20px;"><?php echo $account['city']; ?>,&ThinSpace;&ThinSpace;<?php echo $account['states']; ?>&ThinSpace;&ThinSpace;<?php echo $account['zipcode']; ?></p>
                        </td> 
                        <td><?php echo $account['email']; ?></td> <!-- This displays the customer email -->
                        <td><?php echo formatPhone($account['phoneNum']); ?></td> <!-- This displays the customer phone number -->
                        <td><?php echo $account['dob']; ?></td> <!-- This displays the customer date of birth -->
						<td> <!-- This displays if the account has admin privliages -->
							<?php if (($account['isAdmin'] == true) || ($account['isAdmin'] == "1")) {
									echo $true;
								}
								else {
									echo $false;
								} 
							?>
						</td> 
					</tr>
                    <?php } }?>
                </table>
                <br>
                <input type = "submit" class="btn btn-warning" name = "submit" id = "submit" value = "Delete Selected Account"> <!-- This button is used to submit the completed form -->
                <input type = "reset" class="btn btn-danger" name = "reset" id = "reset" value = "Clear Selection"> <!-- This button is used to clear any information currently entered into the form -->
            </form>
            <p>There is/are <?php echo $count?> total account(s) that can be deleted.</p>
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