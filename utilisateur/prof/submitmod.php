<?php
require("../../controller/controller.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
$array=$_POST;
 foreach($array as $key=>$values){
  if($values>20) $values=20;
  else if($values<0) $values=0;
  submit_note_m($key,$values);
} 

$_SESSION["valid"]="note modified succesfuly";
header("location:modify.php?id={$_GET['id']}&curent={$_GET['curent']}");}
?>