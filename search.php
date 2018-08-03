<?php  
	$query = $_REQUEST['srch'];
	$connect = mysqli_connect("localhost", "root", "", "vege");
  $query = "SELECT * FROM tbl_product WHERE (`name` LIKE '%".$query."%')";
  $result = mysqli_query($connect, $query);  
  if(mysqli_num_rows($result) > 0)  
  {  
    while($row = mysqli_fetch_array($result))  
    {  
?>  
<div class="w3-card col-md-4"  style="width:160px;background-color:rgba(192, 192, 192, 0.212); margin-top: 0px; margin-right: 12px; margin-bottom: 12px; margin-left: 0px; padding-left: 10px; padding-right: 10px;">  
  <button class="w3-padding-16" style="background-color:rgba(192, 192, 192, 0.212); border:none; box-size:none;" onclick="tile1(this.value)" value="<?php echo $row['name']; ?>">
    <div class="w3-display-container">
      <img src="<?php echo $row["image"]; ?>" class="w3-image" style="width:150px;height:150px;"><br />  
      <h4 class="w3-text-grey w3-center"><?php echo $row["name"]; ?></h4>
    </div>
  </button>
</div>
<div class="w3-modal" id="vendor_tile1">
    <div class="w3-modal-content w3-animate-zoom" style="padding:24px">
    <i onclick="document.getElementById('vendor_tile1').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xlarge"></i>
    <div class="w3-container w3-white w3-center" id="vendor_detail1">
    </div>
  </div>
</div>
<?php  
    }  
  }  
	else
  {
	  echo "Sorry!! No Result Found";
  } 
?>  
     
             