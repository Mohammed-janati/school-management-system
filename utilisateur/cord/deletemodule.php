<?php
require("../../controller/controller.php");
 $id=$_GET["id"];
 $idchef=$_GET["id_cord"];
deletemodule($id); 
 header("location:consulter_module.php?id=$idchef");
 ?>