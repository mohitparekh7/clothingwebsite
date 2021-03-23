<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Clothing website</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
</head>
	<style type="text/css">
		.navbar{
			background-color: black;
			margin-bottom: 20px;
			padding: 10px;
		}

		.navbar img{
	      width: 20%;
	    }


		.nav-item{
			padding-left: 10px;
			padding-right: 10px;
		}

		a:link , a:visited{
			color: #f3d8e6;
			font-size: 16px;
		}

		a:hover, a:active{
			color: white;
		}

		.dropdown-menu{
			background-color: black;
		}

		footer .fa{
        padding: 15px;
        font-size: 20px;
        width: 50px;
        text-align: center;
        text-decoration: none;
        margin: 5px 5px;
        border-radius: 50%;
    	}

		.t2{
	      background-color: #c33c82;
	      padding: 0.5px;
	      margin-bottom: 20px;
	      width: 40%;
	      margin: auto;
	      display: block;
	      margin-bottom: 25px;
	    }

	    footer .fa hover{
	          opacity: 0.7;
	    }

	    .fa-facebook {
	        background: #3B5998;
	        color: white;
	    }

	    .fa-twitter {
	        background: #55ACEE;
	        color: white;
	    }
	    .fa-instagram {
	      background: #e95950;
	      color: white;
	    }

	    footer{
	      margin-top: 30px;
	      color: white;
	      background-color: #353135;
	    }

	    footer p{
	      font-size: 14px;
	    }
	</style>


<body>
<nav class="navbar navbar-expand-lg">
		<div class="container navigation">
			<a class="navbar-brand logo" href="index.php">
				<img src="./images/logo11.png">
				<!-- <div>Sitename.com</div> -->
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active px-2">
						<a class="nav-link active-link" href="index.php">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Categories
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="#">Women</a>
							<a class="dropdown-item" href="#">Men</a>
							<a class="dropdown-item" href="#">Kids</a>
						</div>
					</li>
					<li class="nav-item px-2">
						<a class="nav-link" href="about_us.php">About</a>
					</li>
					<li class="nav-item px-2">
						<a class="nav-link" href="contact_us.php">Contact Us</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							My Account
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="#">Profile</a>
							<a class="dropdown-item" href="#">My Orders</a>
							<a class="dropdown-item" href="#">Logout</a>
						</div>

					</li>
					<li>
						<form method="post">
							<?php
							if (empty($cust_id)) {
							?>
								<a href="form/index.php?msg=you must be login first"><span style=" color:#edc4d9; font-size:30px;"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span></a>

								&nbsp;&nbsp;&nbsp;
								<button class="btn btn-outline-danger my-2 my-sm-0" name="login" type="submit">Log In</button>&nbsp;&nbsp;&nbsp;
							<?php
							} else {
							?>
								<a href="cart.php"><span style=" color:green; font-size:30px;"><i class="fa fa-shopping-cart" aria-hidden="true"><span style="color:green;" id="cart" class="badge badge-light"><?php if (isset($re)) {
																																																							echo $re;
																																																						} ?></span></i></span></a>
								<button class="btn btn-outline-success my-2 my-sm-0" name="logout" type="submit">Log Out</button>&nbsp;&nbsp;&nbsp;
							<?php
							}
							?>
						</form>
					</li>
				</ul>
			</div>
		</div>
	</nav>


</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>