<?php
require("../../controller/controller.php");

$id_mod=$_GET['curent'];
$id=$_GET['id'];
$id_fil=$_GET['id_fil'];
if($_SERVER["REQUEST_METHOD"] == "POST"){
$array=$_POST;
var_dump($array);
  foreach($array as $key=>$values){
    if($values>20) $values=20;
    else if($values<0) $values=0;
     
    $year=date('Y');
 $_SESSION["etat"]=submit_note($key,$values,$id_mod,$id_fil,$year); 
  
}  

header("location:affecter.php?id={$_GET['id']}&curent={$_GET['curent']}");}
?>