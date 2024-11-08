<?php
require(__DIR__."/../controller/controller.php");
 $id=$_GET["id"];
 $idchef=$_GET["idchef"];
deletemodule($id); 
 header("location:gerer_module.php?id=$idchef");
 ?>