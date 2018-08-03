<?php
$link = mysqli_connect("localhost", "root", "", "vend_veggie");

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 $att="ptpthakur30@gmail.com";
 $att=strstr($att,'@',true);	

$sql = "CREATE TABLE ".$att."(
    vegetable VARCHAR(30) NOT NULL,
    price VARCHAR(3) NOT NULL
)";
if(mysqli_query($link, $sql)){
    echo "Table created successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 

mysqli_close($link);
?>