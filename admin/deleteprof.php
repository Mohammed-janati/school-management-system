<?php
require(__DIR__."/../controller/controller.php");
 $id=$_GET["id"];
 $id_dep=$_GET["id_dep"];
 $idchef=$_GET["idchef"];
deleteprof($id); 
 header("location:gerer_prof.php?id=$idchef&id_dep=$id_dep");
 ?>