<?php
require("../../controller/controller.php");
 $curent=$_GET["curent"];
 $id=$_GET["id"];
 $id_dep=$_GET["id_dep"];

deletefil($curent); 
 header("location:fillier.php?id=$id&id_dep=$id_dep");
 ?>