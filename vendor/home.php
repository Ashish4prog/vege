<!DOCTYPE html>

<?php session_start(); 

if(!isset($_SESSION["vend"]))
{
	echo "Please login to your Account!!!";
	sleep(3);
	echo "<script>location='login.php'</script>";
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>VegE-veggies now one tap away</title>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="homeStyle.css">
    <link rel="icon" href="/signup/broccoli.jpg" type="image/ico" sizes="64x64">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
		
</head>

<body class="w3-content" style="max-width:1200px; background-color:#ffffff">
    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
        <div class="w3-container w3-green w3-display-container w3-padding">
            <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
            <img class="logo" src="/signup/Logo.png" width=100%>
        </div>
        <hr>
        <div class="w3-padding-64 w3-bottombar w3-topbar w3-large w3-text-grey" style="font-weight:bold">
            <a href="home.php" class="w3-bar-item w3-button">Home</a>
            <a href="orders.html" class="w3-bar-item w3-button">Orders</a>
            <a href="history.html" class="w3-bar-item w3-button">History</a>
            <a href="invoice.html" class="w3-bar-item w3-button">Invoice</a>
        </div>
        <div class="w3-padding-24 w3-large w3-text-grey" style="font-weight:bold">
            <a href="about.html" class="w3-bar-item w3-button w3-padding">About</a>
            <a href="feedback.html" class="w3-bar-item w3-button w3-padding">Feedback</a>
        </div>
    </nav>
	<?php
mysql_connect("localhost", "root","") or die(mysql_error());
mysql_select_db("vege") or die(mysql_error());

$query = "SELECT name FROM tbl_product ORDER BY name ASC";
$result = mysql_query($query) or die(mysql_error()."[".$query."]");


?>
    <!-- Top menu on small screens -->
    <header class="w3-bar w3-top w3-hide-large w3-green w3-xlarge">
        <div class="w3-bar-item w3-green w3-padding-16 w3-wide">
            <img src="/signup/Logo.png">
        </div>
        <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()">
            <i class="fa fa-bars"></i>
        </a>
    </header>

    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="background-color:white; margin-left:250px; max-width:1000px;">

        <!-- Push down content on small screens -->
        <div class="w3-hide-large" style="margin-top:83px"></div>

        <!-- Top header -->
        <div class="w3-container" style="padding:0.01em 10px">
            <header class="w3-container w3-large w3-padding-24" style="background-color:darkslategrey;">
                <div class="w3-right loginSignature">
                    <p class="w3-right w3-large w3-padding-16">
                        <i class="material-icons">person</i>
						<?php
	
					if(!empty($_SESSION['vend']))
					{ 
					 extract($_SESSION);
					echo "<a href='logout.php' class='vendor_name'>".$vend."</a>";
                    }
					?>
                    </p>
                </div>
            </header>
        </div>
		
        <div class="container-fluid main-container" style="max-width:950px; display:flex; flex-wrap:wrap;">
		
		<?php  
		$query1 = "SELECT * FROM vend_veggie where vendor='".$_SESSION['vendusername']."'";
		$result1 = mysql_query($query1) or die(mysql_error()."[".$query."]");
                if(mysql_num_rows($result1) > 0)  
                {  
                     while($row = mysql_fetch_array($result1))  
                     {  
                ?>
            <div class="w3-card w3-padding-16 col-4 margin" style="background-color:rgba(192, 192, 192, 0.212)">
			<form method="post" action="update.php">
                <table class="w3-table">
                    <tr>
                        <td>
                            <div class="w3-display-container w3-text-grey">
                                <img src="/signup/<?php echo $row['vegetable'];?>.jpg" alt="Potato" class="w3-image" style="width:150px;height:150px;">
                            </div>
                            <div class="modify_rem">
                                <button class="w3-button w3-red" style="font-size: 14px!important;" onclick="remove_item(this.value)" name="remove" value="<?php echo $row['vegetable'];?>"><i class="fa fa-remove w3-small"></i></button>
                            </div>
                        </td>
                        <td>
                            <div class="w3-display-container">
                                <p style="font-size:14px!important;"><b><?php echo $row['vegetable'];?></b></p>
                                <p>
                                    <span class="w3-text-grey">In stock : </span>
                                    <input type="text" class="w3-input w3-small w3-text-grey" name="stock" size="5" value="<?php echo $row['stock']?>">
                                </p>
								
                                <p>
                                    <span class="w3-text-grey">price/kg  : </span>
                                    <input type="text" class="w3-input w3-small w3-text-grey" name="price" size="5" value="<?php echo $row['price']?>">
                                </p>
									<input type="hidden" name="vegetable" id="vegetable" value="<?php echo $row['vegetable']; ?>" />
                            </div>
                            <div class="modify">
                                <input type="submit" class="w3-button w3-green w3-margin-top" value="Update" name="Update">
                            </div>
                        </td>
                    </tr>
                </table>
				</form>	
            </div>
           
            <?php  
                     }  
                }  
                ?> 
             
            <div class="w3-card w3-padding-64 col-4 margin addveg">
                <div class="new-vegetable" onclick="document.getElementById('more_items').style.display='block'">
                    <p class="w3-center w3-xxxlarge"><i class="fa fa-plus"></i></p>
                    <p class="w3-large">Add More</p>
					<p id="message"></p>
                </div>
            </div>
            <div class="w3-modal" id="more_items">
                <div class="w3-modal-content w3-animate-zoom" style="padding:24px">
				
                    <div class="w3-container w3-white w3-center">
                        <i onclick="document.getElementById('more_items').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
                        <h2 class="w3-wide">Add Vegetable</h2>
                        <p>
                           
							<select class="w3-input w3-margin w3-border-green w3-border w3-leftbar" placeholder="Vegetable Name" name="veg-name" id="veg_name">
							<?php
						while ($row = mysql_fetch_array($result)) {
						echo "<option value='".$row['name']."'>".$row['name']."</option>";
						}
						?>
					
							</select>
							
                        </p>
                        <p>
                            <input type="text" class="w3-input w3-margin w3-border-green w3-border w3-leftbar" placeholder="In Stock" name="stock_form" id="stock_form">
                        </p>
                        <p>
                            <input type="text" class="w3-input w3-margin w3-border-green w3-border w3-leftbar" placeholder="Price/Kg" name="price_form" id="price_form">
                        </p>
						 <input type="hidden" id="vend_name" name="vend_name" value="ptpthakur30" />
                       <button type="button" class="w3-button w3-padding-large w3-dark-grey w3-margin-bottom w3-margin-top" onclick="insertData()">Add Item</button>
                    </div>
					
                </div>
            </div>
        </div>
    </div>
    <script>
		function insertData() {
			var veg_name=$("#veg_name").val();
			var stock_form=$("#stock_form").val();
			var price_form=$("#price_form").val();
	
	
	

		// AJAX code to send data to php file.
				$.ajax({
					type: "POST",
					url: "insert-data.php",
					data: {veg_name:veg_name,stock_form:stock_form,price_form:price_form},
					success: function(data) {
					document.getElementById('more_items').style.display='none'
					document.getElementById("message").innerHTML=data;
					location.reload();
					},
					error: function(err) {
					alert(err);
					}
				});
				

		}
function remove_item(veg_name){
   
	$.ajax({
		type: "POST",
		url: "remove.php",
		data: {veg_name:veg_name},
		success: function(data) {
		    //document.getElementById('more_item').style.display='none'
		    //document.getElementById("message").innerHTML=data;
		  
		}
	});
}
    </script>
    <script>
        // Accordion 
        function myAccFunc() {
            var x = document.getElementById("demoAcc");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }


        // Script to open and close sidebar
        function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("myOverlay").style.display = "block";
        }
        
        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("myOverlay").style.display = "none";
        }
</script>
<footer class="w3-padding-64 w3-light-grey w3-small w3-center" id="footer">
        <div class="w3-row-padding">
            <div class="w3-col s6">
                <h4>About</h4>
                <p><a href="#">About us</a></p>
                <p><a href="#">Support</a></p>
                <p><a href="#">Find store</a></p>
            </div>

            <div class="w3-col s6 w3-justify">
                <h4>Store</h4>
                <p><i class="fa fa-fw fa-map-marker"></i> VegE Team</p>
                <p><i class="fa fa-fw fa-phone"></i> 1234567890</p>
                <p><i class="fa fa-fw fa-envelope"></i> cart.vege@gmail.com</p>
                <br>
                <i class="fa fa-facebook-official w3-hover-opacity w3-large"></i>
                <i class="fa fa-instagram w3-hover-opacity w3-large"></i>
                <i class="fa fa-pinterest-p w3-hover-opacity w3-large"></i>
                <i class="fa fa-twitter w3-hover-opacity w3-large"></i>
                <i class="fa fa-linkedin w3-hover-opacity w3-large"></i>
            </div>
        </div>
    </footer>
    <div class="w3-green w3-center w3-padding-24">Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="MethCoders.info" target="_blank" class="w3-hover-opacity">MethCoders</a></div>

</body>

</html>