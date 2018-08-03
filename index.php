 <?php   
 session_start(); 
if(isset($_POST['total_cart_items']))
  {
	if(isset($_SESSION['shopping_cart']))
	echo count($_SESSION['shopping_cart']);
	else
	echo "0";
	exit();
  }     
 $connect = mysqli_connect("localhost", "root", "", "vege");  
 if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_GET["id"], $item_array_id))  	
           {  
                  
                $item_array = array( 
					'vend_name'=>  $_POST["vend_name"],				
                     'item_id'               =>     $_GET["id"],  
                     'item_name'               =>     $_POST["hidden_name"],  
                     'item_price'          =>     $_POST["hidden_price"],  
                     'item_quantity'          =>     $_POST["quantity"]  
                );  
                $_SESSION["shopping_cart"][$_GET['id']] = $item_array;  
           }  
           else  
           {  
                echo '<script>
				if(confirm("Item Already Added")==false)
					window.location="index.php";
				</script>';		
					foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["id"])  
                { 
					$key=$keys;
				}
		   }
					  
                $item_array = array( 
					'vend_name'=> $_POST["vend_name"],
                     'item_id'               =>     $_GET["id"],  
                     'item_name'               =>     $_POST["hidden_name"],  
                     'item_price'          =>     $_POST["hidden_price"],  
                     'item_quantity'          =>     $_POST["quantity"]  
                );  
                $_SESSION["shopping_cart"][$key] = $item_array; 
			}  
      }  
      else  
      {  
           $item_array = array(  
		   'vend_name'=>  $_POST["vend_name"],
                'item_id'               =>     $_GET["id"],  
                'item_name'               =>     $_POST["hidden_name"],  
                'item_price'          =>     $_POST["hidden_price"],  
                'item_quantity'          =>     $_POST["quantity"]  
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
 }
 if(isset($_REQUEST["action"]))  
 {  

      if($_REQUEST["action"] == "delete")  
      {  
  $id=$_GET["id"];
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $id)  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';   
                }  
           }  
      }  
 }  
 ?>  
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="icon" href="broccoli.jpg" type="image/ico" sizes="64x64">
  <link rel="stylesheet" type="text/css" href="cart_style.css"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <title>VegE - vegies now one tap away</title>
<script type="text/javascript">

    $(document).ready(function(){

      $.ajax({
        type:'post',
        url:'index.php',
        data:{
          total_cart_items:"totalitems"
        },
        success:function(response) {
          document.getElementById("total_items").value=response;
        }
      });

    });
	function show_cart()
    {
      $.ajax({
      type:'post',
      url:'show_item.php',
      data:{
        showcart:"cart"
      },
      success:function(response) {
        document.getElementById("mycart").innerHTML=response;
        $("#mycart").slideToggle();
      }
     });
	}
	function show_cart1(id)
    {
      $.ajax({
      type:'post',
      url:'show_item.php?bud='+id,
      data:{
        showcart:"cart"
      },
      success:function(response) {
        document.getElementById("mycart").innerHTML=response;
        $("#mycart").slideToggle();
      }
     });
  }
  function myFunction(str) {
	  if (str.length==0) { 
      document.getElementById("contain").style.display = "block";
	    document.getElementById("srch").style.display = "none";
	    return;
	  }
	  document.getElementById("contain").style.display = "none";
		document.getElementById("srch").style.display = "block";
	  var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("srch").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "search.php?srch="+str, true);
    xhttp.send()
  }
</script>	

<style>
#slidecontainer {
    width: 100%;
}

.slider {
    -webkit-appearance: none;
    width: 30%;
    height: 10px;
    background: #d3d3d3;
    outline: none;
    opacity: 0.7;
    -webkit-transition: .2s;
    transition: opacity .2s;
}

.slider:hover {
    opacity: 1;
}

.slider::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    border-radius: 10px;
    width: 20px;
    height: 20px;
    background: #4CAF50;
    cursor: pointer;
}

.slider::-moz-range-thumb {
    width: 25px;
    height: 25px;
    background: #4CAF50;
    cursor: pointer;
}
.w3-sidebar a {font-family: "Roboto", sans-serif}
body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
.mySlides {display:none;}
</style>
</head>

<body class="w3-content" style="max-width:1200px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
  <div class="w3-container w3-green w3-display-container w3-padding">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
    <img class="logo" src="Logo.png" width="100%">
  </div>
  <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
    <a href="index.php" class="w3-bar-item w3-button">Home</a>
    <a href="checkout.php" class="w3-bar-item w3-button">Check Out</a>
    <a href="mapper" class="w3-bar-item w3-button">Vendor's Location</a>
    <a href="about.php" class="w3-bar-item w3-button">About Us</a>
    <a href="#footer" class="w3-bar-item w3-button">Contact</a>
  </div>
 
 <hr height="200px">
  <div id="slidecontainer">
  <input type="range" min="10" max="1000" value="<?php if(isset($_SESSION['bd'])) echo $_SESSION['bd']; else echo "100"; ?>"  class="slider vHorizon" id="myRange"><br>
  <p>Your Budget: Rs. <input type="button" name="prange" id="prange" class="w3-small" value="<?php if(isset($_SESSION['bd'])) echo $_SESSION['bd']; else echo "100"; ?>" onclick="show_cart1(this.value)"></p>
  <a href="clear.php"><u>clear</u></a>
</div>

<script>
$('#myRange').on('change',function(){
	$('#prange').val($('#myRange').val());
});

$('#prange').on('keyup',function(){
	$('#myRange').val($('#prange').val());
	var bd= parseInt($('prange').val());
	xhttp = new XMLHttpRequest();
	xhttp.open("POST", "show_item.php?bud="+bd, true);
	xhttp.send();
});
</script>
</nav>

<!-- Top menu on small screens -->
<header class="w3-bar w3-top w3-hide-large w3-green w3-xlarge">
  <div class="w3-bar-item w3-green w3-padding-24 w3-wide"><img src="Logo.png"></div>
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:250px">

  <!-- Push down content on small screens -->
  <div class="w3-hide-large" style="margin-top:83px"></div>
  
  <!-- Top header -->
  <div class="w3-container">
  <header class="w3-container w3-xlarge  w3-padding">
    <p class="w3-left w3-white">
	<input class="fa fa-search" type="text" name="a" onkeypress="myFunction(this.value)">
	</p>
	<style>
		input[type=text].fa-search {
			width: 40px;
			position:relative;
			box-sizing: border-box;
			border: 1px solid #ccc;
			border-radius: 5px;
			font-size: 14px;
			background-color: white;
			background-image: url('searchicon.png');
			background-position:3.5px 3.5px;
			background-repeat: no-repeat;
			padding: 12px 20px 12px 10px;
			-ms-transition: width 0.4s ease-in-out;
			transition: width 0.4s ease-in-out;
		}

		input[type=text].fa-search:focus {
			width: 150%;
			background-image:none;
		}
	</style>
   
	
	<?php
	
	if(!empty($_SESSION['aut']))
	{ 
     extract($_SESSION);
	echo "<p class='w3-right w3-margin-right' style='postion:relative; margin-top:20px;'>Hello <u><a href='logout.php' ><font color='red'>".$aut."</u></font></a></p>";
	} 
	else 
	{ 
	echo "<p class='w3-right w3-margin-right' style='postion:relative; margin-top:20px;'><a href='login.php' class='customer'><font color='blue' size=5px><u>Sign In</u></font></a></p>";
	}
	
	?>
	
	<div id="h" align="right" >
	  <p id="cart_button" onclick="show_cart();">
      <img src="cart_image.png">
      <input type="button" id="total_items" value="0">
    </p>	  	
    <div id="mycart" class="w3-dropdown-content w3-small w3-border w3-border-green w3-topbar w3-bottombar"></div>
  </div>
  
	<style>
	  .customer{
		  text-decoration:none;
		  font-size:16px;
		  padding: 12px 20px;
	  }
	</style>
  </div>
<!--###########################################################################################################-->
  <!-- Image header -->
  <div class="w3-display-container w3-container">
  
  <div class="w3-content w3-display-container">
    <img class="mySlides" src="sl1.jpg" style="width:100%">
    <img class="mySlides" src="sl2.jpg" style="width:100%">
    <img class="mySlides" src="sl3.jpg" style="width:100%">
    <img class="mySlides" src="sl4.jpg" style="width:100%">
    <img class="mySlides" src="sl5.jpg" style="width:100%">
    <img class="mySlides" src="sl6.jpg" style="width:100%">
    <img class="mySlides" src="sl7.jpg" style="width:100%">

    <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
      <div class="w3-left w3-hover cur" onclick="plusDivs(-1)">&#10094;</div>
      <div class="w3-right w3-hover cur" onclick="plusDivs(1)">&#10095;</div>
    </div>
  </div>
  <style>.cur{cursor:pointer;}</style>
<script>  
	var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
    showDivs(slideIndex += n);
}

function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("mySlides");
    if (n > x.length) {slideIndex = 1} 
    if (n < 1) {slideIndex = x.length} ;
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none"; 
    }
    x[slideIndex-1].style.display = "block"; 
}
	var myIndex = 0;
	carousel();

	function carousel() {
		var i;
		var x = document.getElementsByClassName("mySlides");
		for (i = 0; i < x.length; i++) {
			x[i].style.display = "none";  
		}
		myIndex++;
		if (myIndex > x.length) {myIndex = 1}    
		x[myIndex-1].style.display = "block";  
		setTimeout(carousel, 4000); // Change image every 4 seconds
	}
</script>
  
  
  </div>
  
  <!--#########################################################################################################-->
  
   <!-- Product grid -->
   <h3 align="center">Veg-E Shopping Cart</h3><br> 
   <div id="contain" class="w3-container container-fluid" style="max-width:950px; display:flex; flex-wrap:wrap;">
      <?php  
        $query = "SELECT * FROM tbl_product ORDER BY id ASC";  
        $result = mysqli_query($connect, $query);  
        if(mysqli_num_rows($result) > 0)  
        {  
          while($row = mysqli_fetch_array($result))  
          {  
      ?> 
      <div class="w3-card col-4"  style="width:160px;background-color:rgba(192, 192, 192, 0.212); margin-top: 0px; margin-right: 12px; margin-bottom: 12px; margin-left: 0px; padding-left: 10px; padding-right: 10px;">  
        <button class="w3-padding-16" style="background-color:rgba(192, 192, 192, 0.212); border:none; box-size:none;" onclick="tile(this.value)" value="<?php echo $row['name']; ?>">
          <div class="w3-display-container">
            <img src="<?php echo $row["image"]; ?>" class="w3-image" style="width:150px;height:150px;"><br />  
            <h4 class="w3-text-grey w3-center"><?php echo $row["name"]; ?></h4>
          </div>
        </button>
      </div>
      <?php  
          }  
        }  
      ?>  
      <div class="w3-modal" id="vendor_tile">
        <div class="w3-modal-content w3-animate-zoom" style="padding:24px">
          <i onclick="document.getElementById('vendor_tile').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xlarge"></i>
          <div class="w3-container w3-white w3-center" id="vendor_detail">
          </div>
        </div>
      </div>
			<div style="clear:both"></div>  
    </div>
    <div id="srch" class="w3-container  container-fluid" style="max-width:950px; display:flex; flex-wrap:wrap;">
      <div style="clear:both"></div>
    </div>
  <!--#########################################################################################################-->
  <!-- Subscribe section -->
  <div class="w3-container w3-green w3-padding-32">
    <h1>Subscribe</h1>
    <p>To get special offers and VIP treatment:</p>
    <p><input class="w3-input w3-border" type="text" placeholder="Enter e-mail" style="width:100%"></p>
    <button type="button" class="w3-button w3-black w3-margin-bottom">Subscribe</button>
  </div>
  
  <!-- Footer -->
  <footer class="w3-padding-64 w3-light-grey w3-small w3-center" id="footer">
    <div class="w3-row-padding">
      <div class="w3-col s4">
        <h4>Contact</h4>
        <p>Questions? Go ahead.</p>
        <form action="/action_page.php" target="_blank">
          <p><input class="w3-input w3-border" type="text" placeholder="Name" name="Name" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Email" name="Email" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Subject" name="Subject" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Message" name="Message" required></p>
          <button type="submit" class="w3-button w3-block w3-black">Send</button>
        </form>
      </div>

      <div class="w3-col s4">
        <h4>About</h4>
        <p><a href="#">About us</a></p>
        <p><a href="#">Support</a></p>
        <p><a href="#">Find store</a></p>
      </div>

      <div class="w3-col s4 w3-justify">
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

  <!-- End page content -->
</div>


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
function tile(veg_name){
		// AJAX code to send data to php file.
				$.ajax({
					type: "POST",
					url: "vendor_list.php",
					data: {veg_name:veg_name},
					success: function(data) {
					document.getElementById('vendor_tile').style.display='block';
					document.getElementById("vendor_detail").innerHTML=data;
					//location.reload();
					},
					error: function(err) {
					alert(err);
					}
				});
}
function tile1(veg_name){
		// AJAX code to send data to php file.
				$.ajax({
					type: "POST",
					url: "vendor_list.php",
					data: {veg_name:veg_name},
					success: function(data) {
					document.getElementById('vendor_tile1').style.display='block';
					document.getElementById("vendor_detail1").innerHTML=data;
					//location.reload();
					},
					error: function(err) {
					alert(err);
					}
				});
}
</script>

</body>
</html>
