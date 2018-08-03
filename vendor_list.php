 <head>
 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="icon" href="broccoli.jpg" type="image/ico" sizes="64x64">
  <link rel="stylesheet" type="text/css" href="cart_style.css">
  <script type="text/javascript" src="jquery-3.2.1.js"></script> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 </head>
 <div class="container" style="width:700px;">  
                <?php  
				  session_start();
 
				$vegname=$_POST['veg_name'];
				mysql_connect("localhost","root","");
				mysql_select_db("vege");
                $query = "SELECT * FROM vend_veggie WHERE vegetable='".$vegname."' ORDER BY vendor ASC";  
                $result = mysql_query($query);  
                if(mysql_num_rows($result) > 0)  
                {  
                     while($row = mysql_fetch_array($result))  
                     { 
					$venid=$row["vendor"].$row["vegetable"];
                ?>  
                <div class="w3-bar" style="width:100%; background-color:#cc6600; overfow:auto; border-radius:4px;">  
                     <form method="post" action="index.php?action=add&id=<?php echo $venid; ?>">  
                          <div class="w3-bar-item w3-left" style=" width:25%;">
                            <h4 class="text-info" style="color:white;"><?php echo $row["vendor"]; ?></h4>
                          </div>
                          <div class="w3-bar-item w3-left" style=" width:25%;">
                            <h4 class="text-danger" style="color:white;">₹ <?php echo $row["price"]; ?></h4>
                          </div>
                          <div class="w3-bar-item" style="width:25%;">
                            <input type="number" name="quantity" class="form-control" placeholder="Quantity(in kg)" value=1 min="1" max="30"/>
                          </div>
                            <input type="hidden" name="hidden_name" value="<?php echo $row["vegetable"]; ?>" />  
							              <input type="hidden" name="vend_name" value="<?php echo $row["email"]; ?>" /> 
                            <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
								 					<div class="w3-bar-item w3-right" style="width:25%;">		   
                            <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />  
                          </div>  
                     </form>  
                </div>  
                <?php  
                     }  
                } 
                ?>  
                <div style="clear:both"></div>  
                 
           </div>