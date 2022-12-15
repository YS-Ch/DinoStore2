<?php
session_start();
require('database.php');
// Get product_name
$productName = filter_input(INPUT_GET, 'product_name');
if ($productName == NULL || $productName == FALSE) {
    echo "error";
}
else{// Get products for selected category
$queryProducts = 'SELECT * FROM products
              WHERE productName = :productName
              ORDER BY productID';
$statement1 = $db->prepare($queryProducts);
$statement1->bindValue(':productName', $productName);
$statement1->execute();
$products = $statement1->fetchAll();
$statement1->closeCursor();
}
?>
<html>
<head>
<title>Bootstrap Example</title>
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

#productDeetz{
border-radius:5%;
padding-top: 10px;
padding-bottom: 10px;
}

input[type='number']{
width: 75px;
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
				<li class="nav-item">
					<a class="nav-link" href="index.php" id = "menuOptions">Home</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="products.php" id = "menuOptions">Shop<span class="sr-only">(current)</span></a>
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
				<li class="nav-item">
					<a class="nav-link" href="about.php" id = "menuOptions">About Us</a>
				</li>
			</ul>
		</div>
	</nav>

    <div class="container-fluid">
      
	<center>
	  <input type="search" id="myInput" onkeyup="searchStore()" onfocus = "searchInFocus()" onfocusout="searchNotInFocus()" placeholder="Search for names.." autocomplete="off">
<ul id="searchOptions">
  <li><a href="#">Beipiaosaurus</a></li>
<li><a href="#">Chindesaurus</a></li>
  <li><a href="#">Citipati</a></li>
  
  <li><a href="#">Khaan</a></li>
  <li><a href="#">Kotasaurus</a></li>
  
  <li><a href="#">Protoceratops</a></li>
  <li><a href="#">Stegosaurus</a></li>
  <li><a href="#">Thecodontosaurus</a></li>
  <li><a href="#">Tyrannosaurus Rex</a></li>
  
  <li><a href="#">Velociraptor</a></li>
</ul>

    <section>
	<div class = "container bg-dark" id = "productDeetz">
		<center>
<form action="orderSummary.php" method = "POST">
        <h1><?php echo $products[0][1]; ?></h1>
        <input type="hidden" value = "<?php echo $products[0][1]; ?>" name = "name">
        <div>
                <img  src="<?php echo $products[0][4]; ?>" width = "50%">
			<input type="hidden" name = "picture" value = "<?php echo $products[0][4]; ?>">
		<p><b>Description: </b><?php echo $products[0][2]; ?></p>
            <p><b>List Price:</b> $<?php echo $products[0][3]; ?></p>
            <input type="hidden" value = "<?php echo $products[0][3]; ?>" name = "cost">
            
                <input type="hidden" name="product_id" value="<?php echo $products[0][0]; ?>">
                <b>Quantity:</b>
                <input id="quantity" type="number" name="qty" value="1" minimum="1">
                <br><br>
                <input type="submit" name = "action" value="Add To Cart">
            
        </div>
</form>

</center>
</div>

    </section>
</script>
    <!--</section>-->
<!--</main>-->    
</div>
<script>
        function searchNotInFocus()
{
document.getElementById("searchOptions").style.display = "none";
}
function searchInFocus()
{
if(document.getElementById("myInput").value != "")
{
searchStore();
}
else
{
searchNotInFocus();
}
}
function searchStore() {
if(document.getElementById("myInput").value != "")
{
	document.getElementById("searchOptions").style.display = "inline-block";
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("searchOptions");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
    }
else
{
searchNotInFocus();
}
}
      </script>

        <p style = "text-align: right;">&copy; <?php echo date("Y"); ?> Dino Store</p>
</body>
</html>