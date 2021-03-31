<?php
include("connection.php");
include("header.php");
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<style type="text/css">
  a:link,
    a:visited {
        color: #f3d8e6;
        font-size: 16px;
    }

    a:hover,
    a:active {
        color: white;
    }

    .dropdown-menu {
        background-color: black;
    }


        .dropdown .fa{
            font-size: 24px;
        }

        .vmenu {
            background-color: #404040;
            overflow-x: hidden;
            padding: 10px;
        }

        .vmenu a {
            color: #f3d8e6;
        }

        .vmenu a:hover {
            background-color: white;
            color: black;
        }

        .card img {
            height: 270px;
        }

        .card {
            height: 90%;
            margin-bottom: 20px;
            text-align: center;
        }


        .card img{
            height: 58%;
        }

        .card-title{
            font-size: 16px;
        }

        .card-text {
            font-style: italic;
            font-size: 13px;
            color: #404040;
        }

        .card a:hover {
            color: #404040;
        }

        .btn {
            color: white;
            background-color: #c33c82;
        }


        .btn1:hover {
            background-color: #404040;
        }

</style>
<body>
<div id="special">
<div style="text-align: center; margin-bottom: 20px; font-size: 25px;background: rgb(0, 0, 0); background: rgba(0, 0, 0, 0.20);">
  <h3 style="color:#c33c82; padding: 10px; font-family: 'Merriweather', serif;">Women</h3>
</div>

<div class="container">
  <div class="row row-cols-3">
       <?php
        $product= mysqli_query($con,"SELECT * FROM product WHERE p_gender='Women'"); 
        if (!empty($product)) { 
        while ($row=mysqli_fetch_array($product)) {
          ?>
    <div class="col">
      <div class="card" style="width: 18rem;">
        <?php 
       echo '<img class="card-img-top shop-item-image" src="data:image/jpeg;base64,'.base64_encode( $row['p_img'] ).'"/>';
       ?>
        <div class="card-body">
          <h5 class="card-title shop-item-title"><?php echo $row['p_name']?></h5>
          <div class="shop-item-details">
          <p class="shop-item-price"><?php echo "Rs ".$row['p_price']?></p>
          </div>
          <p class="card-text"><?php echo $row['p_desc']; ?></p>
          <centre><button class="btn shop-item-button" type="submit" value="<?php echo $row["p_id"] ?>" name="add">Add to cart</button></centre>
        </div>
      </div>
    </div>
  <?php
      }
  }  else {
 echo "No Records.";

  }
  ?>
  </div>
</div>

<?php
include("footer.php");
?>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>