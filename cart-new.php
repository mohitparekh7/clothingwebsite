<?php
include("connection.php");
session_start();
$id = $_SESSION['id'];


if (isset($_POST['plus'])) {
    # code...
    // header('location: index.php');
    $pid = $_POST['plus'];
    // echo $pid;
    $res = mysqli_query($con, "SELECT * FROM cart WHERE pid = '$pid'");
    $row = mysqli_fetch_array($res);

    $quantity = $row[5];
    $quantity = $quantity + 1;

    $query = "UPDATE cart SET qty = '$quantity' WHERE pid = '$pid'";
    if (mysqli_query($con, $query)) {
        # code...
?>
    <?php
    } else {
    ?>
        <script type="text/javascript">
            alert("failed!")
        </script>
    <?php
    }
}
if (isset($_POST['minus'])) {
    # code...
    // header('location: index.php');
    $pid = $_POST['minus'];
    // echo $pid;
    $res = mysqli_query($con, "SELECT * FROM cart WHERE pid = '$pid'");
    $row = mysqli_fetch_array($res);

    $quantity = $row[5];
    $quantity = $quantity - 1;

    $query = "UPDATE cart SET qty = '$quantity' WHERE pid = '$pid'";
    if (mysqli_query($con, $query)) {
        # code...
    ?>
    <?php
    } else {
    ?>
        <script type="text/javascript">
            alert("failed!")
        </script>
        <?php
    }
}

if (isset($_POST['checkout'])) {
    # code...
    $u_id = $id;
    $query = mysqli_query($con, "SELECT * FROM cart WHERE u_id = '$u_id' and qty > 0");
    if (!empty($query)) {
        # code...
        while ($row = mysqli_fetch_array($query)) {
            $pid = $row['pid'];
            $qty = $row['qty'];
            $pname = $row['pname'];
            $product_price = $row['qty'] * $row['price'];
            $query1 = "INSERT INTO orders ( u_id,p_id,order_pname,order_price,order_qty,orderstatus) VALUES ('$u_id','$pid','$pname','$product_price','$qty','In Process')";
            if (mysqli_query($con, $query1)) {
        ?>
                <script type="text/javascript">
                    alert("Success!");
                </script>
                <?php
                $query2 = "DELETE FROM cart WHERE u_id = '$u_id'";
                if (mysqli_query($con, $query2)) {
                ?>
                    <script type="text/javascript">
                        document.location = 'index.php';
                    </script>
                <?php
                }
            } else {
                ?>
                <script type="text/javascript">
                    alert("failed!");
                </script>
<?php
                echo mysqli_error($con);
            }
        }
    } else {
        echo "No Records.";
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bay View</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&display=swap" rel="stylesheet">
    <script type="text/javascript" async src="cart-new.js"></script>
    <style type="text/css">
        body {
            overflow-x: hidden;
            background-image: url(./images/bg11.jpg);
        }

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

        .card {
            margin-bottom: 20px;
            text-align: center;
        }

        .card img {
            height: 270px;
        }

        .btn1 {
            background-color: #ff5c33;
            color: white;
            width: 15%;
            border-color: #ff5c33;
            margin-left: 10px;
        }

        .pr {
            background-color: #ff5c33;
            text-align: right;
            padding: 8px;
            color: white;
            font-weight: 700;
            font-size: 20px;
        }

        .pr p {
            margin-bottom: 0px;
        }

        .btn2 {
            background-color: #ff5c33;
            color: white;
            float: right;
            margin-top: 20px;
            margin-bottom: 20px;
            font-size: 18px;
        }

        .fa {
            font-size: 30px;
            margin-right: 10px;
        }

        .foot {
            clear: both;
            background-color: lightgrey;
        }
    </style>
</head>

<body>
    <?php
    include("header.php");
    ?>

    <div style="text-align: center; margin-bottom: 20px; font-size: 25px;background: rgb(0, 0, 0); background: rgba(0, 0, 0, 0.20);">
        <h3 style="color: #ff3030; padding: 10px; font-family: 'Merriweather', serif;">My Cart</h3>
    </div>
    <div class="container">
        <div class="row">

            <?php
            $product = mysqli_query($con, "SELECT * FROM cart WHERE u_id='$id' and qty>=1");
            $total_price = 0;
            if (!empty($product)) {
                while ($row = mysqli_fetch_array($product)) {
                    $productid = $row['pid'];
                    $productImgquery =  mysqli_query($con, "SELECT * FROM product WHERE p_id='$productid'");
                    $row1 = mysqli_fetch_array($productImgquery);
                    $productImg = $row1['p_img'];
                    $product_price = $row['qty'] * $row['price'];
                    $total_price = $total_price + $product_price;
            ?>
                    <form method="post">
                        <div class="col-lg-4">
                            <div class="card" style="width: 18rem;">
                                <?php 
       echo '<img class="card-img-top shop-item-image" src="data:image/jpeg;base64,'.base64_encode( $row1['p_img'] ).'"/>';
       ?>
                                <div class="card-body">
                                    <h5 class="card-title shop-item-title"><?php echo $row['pname'] ?>
                                    </h5>
                                    <div class="shop-item-details">
                                        <p class="shop-item-price">Quantity: <?php echo $row['qty'] ?>
                                            <button type="submit" name="minus" class="btn1" value="<?php echo $row['pid'] ?>">-</button>
                                            <button type="submit" name="plus" class="btn1" value="<?php echo $row['pid'] ?>">+</button>
                                        </p>
                                        <p class="shop-item-price">Price: <?php echo "Rs " . $product_price ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                <?php
                }
                ?>
        </div>
    </div>
    <div class="container">
        <form method="post">
            <div class="pr">
                <p>Total Price: <?php echo $total_price ?></p>
            </div>
            <button type="submit" class="btn btn2" name="checkout">Checkout</button>
        </form>
    <?php
            } else {
                echo "No Records.";
            }
    ?>

    </div>
    <?php
    include("footer.php");
    ?>
</body>

</html>