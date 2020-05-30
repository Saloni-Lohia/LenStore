<?php 
session_start();  

$con = mysqli_connect('localhost','root','','lensdb');
$productOne = $productTwo = '';

$productOne = $_REQUEST['card_one'];
$productTwo = $_REQUEST['card_two'];

$pro1_sql = "select * from compare_data where id='".$productOne."'";
$pro1_query = mysqli_query($con, $pro1_sql);
$pro1 = mysqli_fetch_object($pro1_query);


$pro2_sql = "select * from compare_data where id='".$productTwo."'";
$pro2_query = mysqli_query($con, $pro2_sql);
$pro2 = mysqli_fetch_object($pro2_query);

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="main.js"></script>

    <title>Compare Product</title>

    <style>
    	.card{
    		border: 2px solid #ccc; border-radius: 3px; padding: 10px;
    	}
    </style>
  </head>
  <body>
  	<div class="container">
  		<div class="row">
  			<div class="col-sm-6" style="margin-top: 30px;">
  				<h2>Compare Product List</h2>
  			</div>
        <div class="col-sm-6" style="margin-top: 30px;">
          <a href="compare_index.php" style="text-align: right;"><h2>Back</h2></a>
        </div>	
  		</div>

  		<div class="row" style="margin-top: 50px;">
  			
  			<div class="col-sm-6" style="margin-bottom: 30px; padding: 5px;">
          <div class="card">
            <h3 style="text-align: center; background: #ccc; width: 100%; padding: 10px;">Product One</h3>
  		    
			<?php
			$p1=$pro1->product_image;
            echo 
            "
              <div class='panel-body' align = 'middle'>
                <img src='product_images/$p1' style='width:200px; height:250px;'/>
              </div>
            ";
           ?>
			<p style="text-align: justify;"><h5><b>Features</b></h5></p>
			<p> <b> Brand : </b> <?php echo $pro1->product_title; ?></p>
            <p> <b>Product Price : </b> ₹ <?php echo $pro1->product_price; ?></p>
  			<p> <b> Model : </b> <?php echo $pro1->product_desc; ?></p>
			<p> <b> Description : </b> <?php echo $pro1->product_ov; ?></p>
			<p></p>			
          </div>
  			</div>
        <div class="col-sm-6" style="margin-bottom: 30px; padding: 5px;">
          <div class="card">
            <h3 style="text-align: center; background: #ccc; width: 100%; padding: 10px;">Product Two</h3>
			       
			
			<?php
			$p2=$pro2->product_image;
            echo 
            "
              <div class='panel-body' align = 'middle'>
                <img src='product_images/$p2' style='width:200px; height:250px;'/>
              </div>
            ";
           ?>
		    <p style="text-align: justify;"><h5><b>Features</b></h5></p>
			<p> <b> Brand : </b> <?php echo $pro2->product_title; ?></p>
            <p> <b>Product Price : </b> ₹ <?php echo $pro2->product_price; ?></p>
  			<p> <b> Model : </b> <?php echo $pro2->product_desc; ?></p>
			<p> <b> Description : </b> <?php echo $pro2->product_ov; ?></p>
			<p></p>
          </div>
        </div>	
  			
  		</div>
  	</div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
</html>
