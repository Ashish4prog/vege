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

 if(isset($_POST['showcart']))
  {
?>
<head>

<link rel="stylesheet" type="text/css" href="cart_style.css">
</head>
<body>
	  <table border=0 class="w3-panel">  
      <tr>  
		<th width="20%"></th>
        <th width="25%">Item Name</th>  
        <th width="15%">Quantity</th>  
        <th width="20%">Price</th>  
        <th width="10%">Total</th>  
        <th width="10%">Action</th>  
      </tr>  
      <?php   
        if(!empty($_SESSION["shopping_cart"]))  
        {  
          $total = 0;  
          foreach($_SESSION["shopping_cart"] as $keys => $values)  
          {  
      ?>  
      <tr>  
		<td>
          <?php 	echo "<div class='cart_items'>";
					  echo "<img src='".$values["item_name"].".jpg'>";
          ?>
        </td>
        <td><?php echo $values["item_name"]; ?></td>  
        <td><?php echo $values["item_quantity"]; ?></td>  
        <td>₹ <?php echo $values["item_price"]; ?></td>  
        <td>₹ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
        <td align="center"><a href="index.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger"><img src="delete.png" width=25 height=25></span></a></td><?php echo "</div>"; ?>  
      </tr>  
      <?php  
            $total = $total + ($values["item_quantity"] * $values["item_price"]); 
				    $_SESSION["total"]=$total;
          }
      ?>  
      <tr>
        <td colspan=6><p><hr></p></td>
      </tr>
      <tr> 
        <td></td>						  
        <td colspan="2"></td>
        <td><b>Total</b></td>  
        <td>₹<b>
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
        ?></b>
        </td>  
        <td></td>  
      </tr> 
      <tr>
        <td colspan=6><p><hr></p></td>
      </tr>
      <tr>
        <td colspan=5></td>
				<td><?php echo "<input type='button' id='checkout'class='w3-button w3-green' value='checkout' onclick='javascript:window.location.href=`checkout.php`'>";?></td>
			</tr>						  
      <?php  
        }  
      ?>  
    </table> 
	</body>
<?php
exit();
  }
?>					 