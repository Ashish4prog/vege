<?php 
session_start();
if(isset($_REQUEST['bud'])){
$bd=$_REQUEST['bud'];
if(empty($_SESSION['bd']))
$_SESSION['bd']=$bd;
}
else
{	$bd=100000000;
}

 
?>
<head>
<style>
#button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
	align:right;
}
</style>
<link rel="stylesheet" type="text/css" href="cart_style.css">
</head>
<body>
	  <table border=0>  
                          <tr>  
						  <th></th>
                               <th width="40%">Item Name</th>  
                               <th width="10%">Quantity</th>  
                               <th width="20%">Price</th>  
                               <th width="15%">Total</th>  
                               <th width="5%">Action</th>  
                          </tr>  
                          <?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>  
                          <tr>  
							<td><?php 	echo "<div class='cart_items'>";
							echo "<img src='".$values["item_name"].".jpg' width=150 height=150>";
							?></td>
                               <td><?php echo $values["item_name"]; ?></td>  
                               <td><?php echo $values["item_quantity"]; ?></td>  
                               <td>₹ <?php echo $values["item_price"]; ?></td>  
                               <td>₹ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                               <td><a href="democontent.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger"><img src="delete.png" width=25 height=25></span></a></td><?php echo "</div>"; ?>  
                          </tr>  
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                          ?>  
                          <tr> 
<td></td>						  
                               <td colspan="3" align="right">Total</td>  
                               <td align="right">₹ 
							   <?php 
							   if(isset($_SESSION['bd'])){
							   if($_SESSION['bd']>=$total){
							   echo number_format($total, 2);
							 
//echo $bd;
							   }							   
								else
								{    echo "<script type='text/javascript'>window.alert('Do you want to continue')</script>";
									echo "<font color='red'>".number_format($total,2)."</font>";
							//echo $bd;
								}
							   }
							   else
								  echo number_format($total, 2); 
							   ?></td>  
                               <td></td>  
                          </tr>  
						  <tr>
						  <td><?php echo "<input type='button' value='checkout' onclick='javascript:window.location.href=`success.php`' id='button' >";?></td>
						  </tr>
                          <?php  
                          }  
                          ?>  
                     </table> 
					 </body>