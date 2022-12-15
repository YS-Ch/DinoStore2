<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
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
        img{
        opacity: .25;
        width: 50%;
        length: 50%;
        }
        
div p{
padding-top: 35%;
font-size: 2vmin;
}

.btn-circle.btn-sm {
      width: 20vmin;
			height: 20vmin;
			color: orange;
			border-radius: 50%;
			font-size: 3vmin;
			text-align: center;
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
				<li class="nav-item active">
					<a class="nav-link" href="index.php" id = "menuOptions">Home
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
	  <h2>HOME</h2>
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

	  <form action = "products.php" method = "GET">
  	<div class="form-row">
      <div class="col"></div>
      <div class="col"><h3>Categories</h3></div>
      <div class="col"></div>
    </div>
    <div class="form-row">
       <div class="col">
         <input type="submit" class="bg-dark btn-circle btn-sm" value = "Carnivore" name = "category">
      </div>
      <div class="col">
         <input type="submit" class="bg-dark btn-circle btn-sm" value = "Herbivore" name = "category">
      </div>
      <div class="col">
         <input type="submit" class="bg-dark btn-circle btn-sm" value = "Omnivore" name = "category">
      </div>
     
    </div>
    </form>
    <br>
    <!--<form>
    <div class="form-row">
      <div class="col"></div>
      <div class="col"><h3>Discounts</h3></div>
      <div class="col"></div>
    </div>
    <div class="form-row">
      <div class="col">
      	<img src = "https://cdn.prime1studio.com/media/catalog/product/cache/1/p1s_cropped_image/9df78eab33525d08d6e5fb8d27136e95/p/c/pcfjw-01_cropped.jpg">
        <div class="centered">20%off</div>
      </div>
      <div class="col">
        <img src = "https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/b83df2a3-3d34-4c7a-a863-a8e70180075d/dercdw6-7224952b-d676-4c65-a197-ffe1caaff559.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcL2I4M2RmMmEzLTNkMzQtNGM3YS1hODYzLWE4ZTcwMTgwMDc1ZFwvZGVyY2R3Ni03MjI0OTUyYi1kNjc2LTRjNjUtYTE5Ny1mZmUxY2FhZmY1NTkucG5nIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.My6e9akmfwSjebKsmElGwBbXJp-1q9UHeRoVg9sIy-g">
        <div class="centered">30%off</div>
      </div>
    </div>
    </form>-->
    </center>
  <br>

</div>
      <!-- Javascript -->
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