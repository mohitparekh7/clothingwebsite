<?php
// session_start();
// $id = $_SESSION['id'];
include('connection.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Jade</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&display=swap" rel="stylesheet">
    <style type="text/css">
        .logo img {
            height: 55px;
        }

        .nav-link {
            padding: 8px 10px 8px !important;
        }

        .navigation a {
            font-size: 17px;
            color: black;
        }

        .navigation a:hover {
            color: #ff5c33;
        }


        .navigation a.active-link {
            background-color: #ff5c33;
            color: white;
            border-radius: 5px;

        }


        .dropdown-menu a:active {
            background-color: #404040;
        }

        .nav-item .fa {
            font-size: 35px;
            margin-top: 2px;
            color: #ff5c33;
        }

        .navbar-center {
            position: relative;
            left: 27%;
        }

        .navi {
            background-color: #404040;
        }

        .navi nav {
            padding: 0px;
            margin-bottom: 40px;
        }

        .navi li {
            margin-left: 20px;
        }

        .navi a {
            font-family: 'Merriweather', serif;
            color: #ff4040;
            font-size: 20px;
        }

        .navi a:hover {
            color: white;
            background-color: #ff5c33;
        }

        .vmenu {
            background-color: #404040;
            overflow-x: hidden;
            padding: 10px;
        }

        .vmenu a {
            color: #ff3030;
        }

        .vmenu a:hover {
            background-color: white;
        }

        .card img {
            height: 270px;
        }

        .card {
            /*height: 82.5%;*/
            margin-bottom: 20px;
            text-align: center;
        }

        .card-text {
            font-style: italic;
            font-size: 16px;
            color: #404040;
        }

        .card a:hover {
            color: #404040;
        }

        .btn {
            color: white;
            background-color: #ff5c33;
        }


        .btn1:hover {
            background-color: #404040;
        }


        .modal-header h4 {
            text-align: center;
            font-family: 'Merriweather', serif;
            letter-spacing: 1px;
            font-weight: 900;
        }

        .cart-price {
            margin-top: 10px;
        }

        .cart-total {
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .fa {
            font-size: 30px;
            margin-right: 10px;
        }

        .foot {
            background-color: lightgrey;
        }
    </style>
</head>

<body>
    <?php
    include("header.php");
    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2">
                <div class="vmenu" id="vmenus">

                    <ul class="nav flex-column menu">
                        <li class="nav-item">
                            <a class="nav-link active-link" href="?page=mens">Mens</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="?page=womens">Womens</a>
                        </li>

                    </ul>
                </div>
            </div>

            <div class="col-lg-10">
                <form method=POST>

                    <?php
                    if (isset($_GET['page'])) {
                        $p = $_GET['page'];
                        $page = $p . ".php";

                        if (file_exists($page))
                            include($page);
                    } else {
                        include 'mens.php';
                    }
                    ?>
                </form>
            </div>
            <?php
      
      if(isset($_POST['add'])) 
      {
       
        $pid = $_POST["add"];
        $res = mysqli_query($con, "SELECT * FROM product WHERE p_id='$pid'");
        $row = mysqli_fetch_array($res);
        $price = $row[7]; //price
        $pname = $row[3]; //pname
        $img = $row[8];
        $vendor=$row[2]; //vendor name
        $pdesc=$row[6];
      
        $create = "CREATE TABLE IF NOT EXISTS cart (pid INT PRIMARY KEY, pname VARCHAR(255) NOT NULL, price INT NOT NULL,qty INT, pdesc VARCHAR(255),vendor VARCHAR(255))";
        if (mysqli_query($con, $create)) 
        {

            global $con;
            $result = mysqli_query($con,"SELECT * FROM cart WHERE pid = '$pid' ");
            $res1=mysqli_fetch_row($result);
            if($res1) 
            {
              
              $q=$res1[3];
              $q = $q + 1;
              $query = " UPDATE cart SET qty= '$q' WHERE pid='$pid' ";
              if(mysqli_query($con, $query)==FALSE)  
                  {  
                  echo '<script>alert("Failed to add item to cart. Try again.")</script>';  
                  } 

            } 
            else {

                  //Implies adding first time to cart
            $query = "INSERT INTO cart (pid,pname,price,qty,pdesc,vendor) VALUES('$pid','$pname','$price','1','$pdesc','$vendor')"; 
            if(mysqli_query($con, $query)==FALSE)  
                  {
                  echo '<script>alert("Failed to add item to cart. Try again.")</script>'.mysqli_error($con);  
                  }
              }
        } 
        else 
        {
              echo "Sorry, couldn't connect to the database: " . mysqli_error($con);
        }
      }   

    ?>


        </div>
    </div>

    <?php
    include("footer.php");
    ?>

</body>

</html>