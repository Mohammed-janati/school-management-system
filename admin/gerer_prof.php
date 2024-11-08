<?php  
require("../controller/controller.php");

$user=searchadmin($_GET["id"]);
$id=$user["id"];
$id_dep=$_GET["id_dep"];
?>

<?php ob_start();
  ?>


<nav class="navbar navbar-light bg-primary navbar_me">
  <span class="navbar-brand mb-0  text-white">
    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3  my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary bg-light" style="border:1px solid white; border-left:1px solid black;" type="button">
<img src="../../../img/search.png" class="w-50" alt="">
                              </button>
                            </div>
                        </div>
                    </form>
                  </span>

                    <div><img src="../../../img/notification.png"  class="email " alt="">
                    <img src="../../../img/email.png"  class="email" alt=""></div>
</nav>

<?php $nav=ob_get_clean();
  ?>

<?php ob_start();
  ?>

<?php
echo " <a class='sidebar-brand d-flex align-items-center justify-content-center' href='admin.php?id={$id}'>
<div class='sidebar-brand-icon rotate-n-15 logo'>
<img src='../img/logo.png' alt='logo'>
<b>gestion de note</b>
</div></a>";
?>



<!-- Divider -->
<hr class="  my-2">

<!-- Nav Item - Dashboard -->
<li class="nav-item ">
<?php

echo "  <a class='nav-link' href='admin.php?id={$id}&id_dep={$id_dep}'>
<img  src='../img/home.png' alt=''>
<span class='dashfont'>Dashboard</span></a>";
?>
   
</li>





<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
<?php
echo "  <a class='nav-link collapsed' href='gerer_module.php?id={$id}&id_dep={$id_dep}'>
<img class='iconm' src='../img/module.png' alt=''>
<span class='sidefont' >gerer module</span>
</a>";
?>
    
    
</li>





<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item ">
<?php
echo "   <a class='nav-link mb ' href='gerer_prof.php?id={$id}&id_dep={$id_dep}'>
<img class='iconm' src='../img/prof.png' alt=''>
 <span class='sidefont '>gerer prof</span>
</a>";
?>
    
</li>

<li class="nav-item ">
<?php
echo "   <a class='nav-link jsf' href='gerer_cord/cord.php?id={$id}&id_dep={$id_dep}'>
<img src='../../img/cord.png' class='cord' alt=''>
 <span class='sidefont'>gerer cordinateur</span>
</a>";
?>
   
</li>


<li class="nav-item ">
<?php
echo "   <a class='nav-link jsf' href='gerer_student/student.php?id={$id}&id_dep={$id_dep}'>
<img src='../../img/std.png' class='cord' alt=''>
 <span class='sidefont'>gerer etudient</span>
</a>";
?>

</li>

<li class="nav-item ">
<?php
echo "   <a class='nav-link jsf' href='gerer_fillier/fillier.php?id={$id}&id_dep={$id_dep}'>
<img src='../../img/fil.png' class='cord' alt=''>
 <span class='sidefont'>gerer fillier</span>
</a>";
?>

</li>

<?php 
$content=ob_get_clean();?>

                        <!-- main-->
 <?php
ob_start();
?>
<a href="ajouterprof.php?id=<?= $id?>&id_dep=<?= $id_dep?>"><button class="btn btn-primary mb-2">ajouter</button></a>

<table class="table ">
<thead>
  <tr>
    <th scope="col">ID</th>
    <th scope="col">EMAIL</th>
    <th scope="col">NAME</th>
    <th scope="col">deparetement</th>
    <th scope="col">action</th>
    <th scope="col"></th>
      
    
    

    
  </tr>
</thead>
<tbody>

  <?php
  $result=getprof();
  $dep="";
  foreach($result as $row){
switch($row["id_dep"]){
  case 1: $dep="departement energitique et civil"; break;
  case 2: $dep="departement mathematique informatique"; break;
  default:$dep="";
}

$curent=$row["id"];


    echo "<tr>
    <th scope='row'>{$row['id']}</th>
    <td>{$row['email']}</td>
    <td>{$row['name']}</td>
    <td>{$dep}</td>

    <td> <div class='d-flex'><a href='modifyprof.php?id=$curent&idchef=$id&id_dep={$id_dep}' class='btn btn-primary mb-2 mr-2'>modify</a>
    <a href='deleteprof.php?id=$curent&idchef=$id&id_dep={$id_dep}' class='btn btn-danger mb-2 '>delete</a></div>
    </td>
    </tr>";
  }
  ?>
</tbody>

<?php 
$main=ob_get_clean();
?>

<?php 
require("../layout/layoutgestion.php");
?>


