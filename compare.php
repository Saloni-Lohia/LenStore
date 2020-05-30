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
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
		<link rel="stylesheet" type="text/css" href="style.css">

	<script src="main.js"></script>

    <title>Compare Product</title>

    <style>
    	.card{
    		border: 2px solid #ccc; border-radius: 3px; padding: 10px;
    	}
    </style>
  </head>
  <body>
  <div class="wait overlay">
	<div class="loader"></div>
</div>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">	
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
					<span class="sr-only">navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="#" class="navbar-brand">LenStore</a>
			</div>
		<div class="collapse navbar-collapse" id="collapse">
			<ul class="nav navbar-nav">
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
				<li><a href="compare_index.php"><span class="glyphicon glyphicon-stats"></span>Compare</a></li>
                                
			</ul>
			<form class="navbar-form navbar-left">
		        <div class="form-group">
		          <input type="text" class="form-control" placeholder="Search" id="search">
		        </div>
		        <button type="submit" class="btn btn-primary" id="search_btn"><span class="glyphicon glyphicon-search"></span></button>
		     </form>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="register.php" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Cart<span class="badge">0</span></a>
					<div class="dropdown-menu" style="width:400px;">
						<div class="panel panel-success">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-3">Sl.No</div>
									<div class="col-md-3">Product Image</div>
									<div class="col-md-3">Product Name</div>
									<div class="col-md-3">Price in ₹.</div>
								</div>
							</div>
								
							<div class="panel-body">
								<div id="cart_product">
								<!--<div class="row">
									<div class="col-md-3">Sl.No</div>
									<div class="col-md-3">Product Image</div>
									<div class="col-md-3">Product Name</div>
									<div class="col-md-3">Price in ₹.</div>
								</div>-->
								</div>
							</div>
							<div class="panel-footer"></div>
						</div>
					</div>                  
				</li>
			</ul>
		</div>
	</div>
</div>	
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
  	<div class="container">
  		<div class="row">
  			<div class="col-sm-6" style="margin-top: 10px;">
  			</div>
  		</div>

  		<div class="row" style="margin-top: 10px;">
  			
  			<div class="col-sm-6" style="margin-bottom: 10px; padding: 5px;">
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
