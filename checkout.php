<?php 
session_start();
if(isset($_REQUEST['bud'])){
    $bd=$_REQUEST['bud'];
    if(empty($_SESSION['bd']))
    $_SESSION['bd']=$bd;
}else{
    $bd=100000000;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>VegE - vegies now one tap away</title>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="cart_style.css">
    <link rel="icon" href="./broccoli.jpg" type="image/ico" sizes="64x64"> 

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="jquery-3.2.1.js"></script>

    <style>
        #button {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            margin: 5px;
            border-radius: 4px;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            align:right;
        }
    </style>
    <style>
        #items {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #items td, #items th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #items tr:nth-child(even){background-color: #f2f2f2;}

        #items tr:hover {background-color: #ddd;}

        #items th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body class="w3-content" style="max-width:1200px">
    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
        <div class="w3-container w3-green w3-display-container w3-padding">
            <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
            <img class="logo" src="Logo.png" width=100%>
        </div>
        <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
            <a href="index.php" class="w3-bar-item w3-button">Home</a>
            <a href="checkout.php" class="w3-bar-item w3-button">Check Out</a>
            <a href="mapper" class="w3-bar-item w3-button">Vendor's Location</a>
            <a href="about.php" class="w3-bar-item w3-button">About Us</a>
            <a href="#footer" class="w3-bar-item w3-button">Contact</a>
        </div>
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
                    <input class="fa fa-search" type=text name=a>
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
                    if(!empty($_SESSION['aut'])){ 
                        extract($_SESSION);
                        echo "<p class='w3-right w3-margin-right' style='position:relative; margin-top:20px;'>Hello <u><a href='logout.php' ><font color='red'>".$aut."</u></font></a></p>";
                    } else{ 
                        echo "<p class='w3-right w3-margin-right' style='position:relative; margin-top:20px;'><a href='login.php' class='customer'><font color='blue' size=5px><u>Sign In</u></font></a></p>";
                    } 
                ?>
                <style>
                    .customer{
                        text-decoration:none;
                        font-size:16px;
                        padding: 12px 20px;
                    }
                </style>
            </header>
        </div>    
        <!--###########################################################################################################################################################################################################-->
        
        <div class="w3-display-container w3-container">
            <hr>
            <?php if(!empty($_SESSION["shopping_cart"]))  { ?>
            <table class="w3-center w3-container w3-section" id="items" border=0>  
                <tr>  
					<th width="20%"></th>
                    <th width="20%" style="text-align: center;">Item Name</th>  
                    <th width="10%" style="text-align: center;">Quantity</th>  
                    <th width="20%" style="text-align: center;">Price</th>  
                    <th width="20%" style="text-align: center;">Total</th>  
                    <th width="10%" style="text-align: center;">Action</th>  
                </tr>  
                <?php   
                    if(!empty($_SESSION["shopping_cart"]))  {  
                        $total = 0;  
                        foreach($_SESSION["shopping_cart"] as $keys => $values)  {  
                ?>  
                <tr>  
					<td id="image"><?php 	echo "<div class='cart_items'>"; echo "<img src='".$values["item_name"].".jpg' width=150 height=150>";?></td>
                    <td id="name"><?php echo $values["item_name"]; ?></td>  
                    <td id="quant"><?php echo $values["item_quantity"]; ?></td>  
                    <td id="price">₹ <?php echo $values["item_price"]; ?></td>  
                    <td id="tot">₹ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                    <td id="act"><a href="index.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger"><img src="delete.png" width=25 height=25></span></a></td><?php echo "</div>"; ?>  
                </tr>  
                    <?php  
                            $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                        }  // end of foreach()
                    ?> 
                <tr> 
                    <td></td>						  
                    <td colspan="3" style="text-align: center;">Total</td>  
                    <td align=>₹ 
						<?php 
							if(isset($_SESSION['bd'])){
							    if($_SESSION['bd']>=$total){
							    echo number_format($total, 2);
							    //echo $bd;
							    }else{
                                    echo "<script type='text/javascript'>window.alert('Do you want to continue')</script>";
									echo "<font color='red'>".number_format($total,2)."</font>";
							        //echo $bd;
								}
							}else echo number_format($total, 2); 
                        ?>
                    </td>  
                    <td></td>  
                </tr>
            </table>
            <tableclass="w3-center w3-container" id="checkout" border=0>
				<tr>
                    <td></td>
                    <td colspan="4" ></td>
					<td><?php echo "<input type='button' value='confirm checkout' onclick='javascript:window.location.href=`success.php`' id='button' >";?></td>
                </tr>
                    <?php  
                    }  //end of if(!empty($_SESSION["shopping_cart"]))
                    ?>  
            </table>
            <?php } else{ ?>
                    <p class="w3-center w3-large w3-padding-24">Nothing added in your cart.</p>
            <?php }
            ?>
            <hr>
        </div> 

        <!--###########################################################################################################################################################################################################-->
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
    </script>
</body>
</html>