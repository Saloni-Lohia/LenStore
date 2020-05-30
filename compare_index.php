
<?php
$con = mysqli_connect('localhost','root','','lensdb');
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    

    <title>LenStore</title>
	
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
		<link rel="stylesheet" type="text/css" href="style.css">

    <style>
    	.card{
    		border: 2px solid #ccc; border-radius: 3px; padding: 10px;
    	}

      .card_check{
        border: 3px solid red;
      }

    	.compare{
    		font-weight: 600; color: blue; cursor: pointer;
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
				</li>
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><?php echo "Hi,".$_SESSION["name"]; ?></a>
					<ul class="dropdown-menu">
						<li><a href="cart.php" style="text-decoration:none; color:blue;"><span class="glyphicon glyphicon-shopping-cart">Cart</a></li>
						<li class="divider"></li>
						<li><a href="customer_order.php" style="text-decoration:none; color:blue;">Orders</a></li>
						<li class="divider"></li>
						<li><a href="" style="text-decoration:none; color:blue;">Change Password</a></li>
						<li class="divider"></li>
						<li><a href="logout.php" style="text-decoration:none; color:blue;">Logout</a></li>
					</ul>
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
  			<div class="col-sm-12" style="margin-top: 10px;">
  			</div>
  		</div>

      <div class="row" id="btn_compare" style="display:none;">
        <div class="col-sm-12" style="margin-top: 10px;">
          <form action="compare.php" method="post">
               <input type="hidden" value="" id="card_one" name="card_one"/>
               <input type="hidden" value="" id="card_two" name="card_two"/>
               <input type="submit" value="Compare Product" class="btn btn-success" style="float:right;"/>
           </form>
        </div>
      </div>
  		<div class="row" style="margin-top: 50px;">
  			<?php
				$sql = "select * from compare_data";
				$query = mysqli_query($con, $sql);
				while($row = mysqli_fetch_array($query))
				{
					$pro_image = $row['product_image']; 
			?>
  			<div class="col-sm-3" style="margin-bottom: 30px; padding: 5px;">
  				<div class="card compare_card<?php echo $row['id']; ?>">
	  				<p style="color: blue; font-weight: 600;"><?php echo $row['product_title']; ?></p>
            <p style="color: blue; font-weight: 600;"><?php echo $row['product_categories']; ?></p>
            <?php
            echo 
            "
              <div class='panel-body' align = 'middle'>
                <img src='product_images/$pro_image' style='width:100px; height:150px;'/>
              </div>
            ";
           ?>
	  				<button style="color: #fff;" class="btn btn-primary btn-xs compare" rel="<?php echo $row['id']; ?>">Compare</button>
  				</div>
  			</div>
  			<?php
  				}
  			?>
  		</div>
  	</div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script type="text/javascript">
    	$(document).ready(function(){
           $(document).on('click','.compare',function(){
            var id = $(this).attr('rel');
            var size_class = $('.card_check').length;
            if(size_class > 1)
            {
                if($(".compare_card"+id).hasClass("card_check"))
                {

                    $(".compare_card"+id).removeClass("card_check");

                }
                else
                {
                    alert("You have already select maximum product");
                }

            }
            else
            {
                if(size_class>0)
                {
                     $('#btn_compare').show();
                }

                if($(".compare_card"+id).hasClass("card_check"))
                {
                    $(".compare_card"+id).removeClass("card_check");
                }
                else
                {
                    $(".compare_card"+id).addClass("card_check");

                    var pro1 = $('#card_one').val();
                    var pro2 = $('#card_two').val();

                    if(pro1=="")
                    {
                        $('#card_one').val(id);
                    }
                    else if(pro2=="")
                    {
                        $('#card_two').val(id);
                    }
                }
            }
           });
       });
    </script>
  </body>
</html>
