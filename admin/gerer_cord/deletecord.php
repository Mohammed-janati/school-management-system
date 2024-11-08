<?php
require("../../controller/controller.php");
 $curent=$_GET["curent"];
 $id=$_GET["id"];
 $id_dep=$_GET["id_dep"];

deletecord($curent); 
 header("location:cord.php?id=$id&id_dep=$id_dep");
 ?>