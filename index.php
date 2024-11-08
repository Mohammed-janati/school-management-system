<?php

$configuration=require("configuration/configuration.php");
$router=$configuration["router"];
$uri=parse_url($_SERVER["REQUEST_URI"])['path'];

if(array_key_exists($uri,$router)){
  require($router[$uri]);
}else{
 require("views/404.php");
 die();
}



?>

