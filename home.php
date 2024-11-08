<?php 

include ("controller/controller.php");
$_SESSION["login"]=null;
if(isset($_POST["submit"]) && !empty($_POST["email"]) && !empty($_POST["password"])){

  $email=filter_input(INPUT_POST,"email",FILTER_VALIDATE_EMAIL);
  $password=filter_input(INPUT_POST,"password",FILTER_SANITIZE_SPECIAL_CHARS);
  verifyuser($email,$password);
}else if(isset($_POST["submit"]) && (empty($_POST["password"]) || empty($_POST["email"]))){
  $_SESSION["login"]="please entrer valide email/password";
  
  header("location:login.php");
}

?>