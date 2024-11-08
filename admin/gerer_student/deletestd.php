<?php
require("../../controller/controller.php");
 $curent=$_GET["curent"];
 $id=$_GET["id"];
 $id_dep=$_GET["id_dep"];
deletestd($curent); 
 header("location:student.php?id=$id&id_dep=$id_dep");
 ?>