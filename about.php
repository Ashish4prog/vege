<html>
<head>
<title>VegE - vegies now one tap away</title>
<link rel="stylesheet" type="text/css" href="cart_style.css">
  <script type="text/javascript" src="jquery-3.2.1.js"></script> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="icon" href="./broccoli.jpg" type="image/ico" sizes="64x64">
<style>
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
    <img class="logo" src="Logo.png" width=100%>
  </div>
  <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
    <a href="index.php" class="w3-bar-item w3-button">Home</a>
    <a href="checkout.php" class="w3-bar-item w3-button">Check Out</a>
    <a href="mapper" class="w3-bar-item w3-button">Vendor's Location</a>
    <a href="about.php" class="w3-bar-item w3-button">About Us</a>
  <a href="#footer" class="w3-bar-item w3-button w3-padding">Contact</a> 
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

  <!--#################################################################################################################-->
  
  <div class="w3-container">
    <div style="height: 520px; padding-top: 50px; padding-right: 50px;padding-left: 20px; border: thin solid #FFFFFF;border-left: #FFFFFF;border-top: #FFFFFF">
      <h1>About Us</h1>
      <hr style="border:thin solid #000000">
      <p>Veg-E is a comprehensive online vegetable store in Bhilai, which aims at providing fresh & organic vegetables to its customer at nominal price. Covering several regions of Bhilai in associate with discrete vendors rendering prompt delivery. Now, you can place order of organic vegetables at your leisure and from the comfort of your home. Vegetables just a tap away from our customers. We solemn pledge to maintain quality stock and efficiency in our work.</p><br><br>
      <h2 >Services provided by our vendors</h2>
      <hr style="border:thin solid #000000">
      <p>We at Veg-E make sure that the vendors we approve have something special for our customers. Vendors at Veg-E provide variety of services to their customers including home delivery system, pre-chopped vegetables and return policy</p>
    </div>
  </div>
<!--#################################################################################################################-->
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

</body>
</html>
