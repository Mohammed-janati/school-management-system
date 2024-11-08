<?php  
require("../../controller/controller.php");

$curent=$_GET["id"];
$id=$_GET["idchef"];



?>




                      <!-- navbar-->
 <?php ob_start();
  ?>

<nav class="navbar navbar-light bg-primary navbar_me">
  <span class="navbar-brand mb-0 h1 text-white">liste des notes</span>
</nav>

<?php $nav=ob_get_clean();
  ?>
                      <!-- end navbar-->

<!--                       sidebar--> 
<?php ob_start();
  ?>


<!-- side bar-->
<?php
echo " <a class='sidebar-brand d-flex align-items-center justify-content-center' href='cord.php?id={$id}'>
<div class='sidebar-brand-icon rotate-n-15 logo'>
<img src='../../img/logo.png' alt='logo'>
<b>gestion de note</b>
</div></a>";
?>






<!-- Nav Item - Dashboard -->
<li class="nav-item ">
<?php
echo "  <a class='nav-link' href='cord.php?id={$id}'>
<img  src='../../img/home.png' alt=''>
<b class='dashfont'>Dashboard</b></a>";
?>
   
</li>

<!-- Divider -->




<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
<?php
echo "  <a class='nav-link collapsed' href='consulter_module.php?id={$id}'>
<img class='iconm' src='../../img/module.png' alt=''>
<b class='sidefon' >consulter module </b>
</a>";
?>
    
    
</li>
<li class="nav-item">
<?php
echo "  <a class='nav-link collapsed' href='note.php?id={$id}'>
<img class='iconm' src='../../img/module.png' alt=''>
<b class='sidefon' >afficher notes </b>
</a>";
?>
    
    
</li>



</li>
<li class="nav-item">
<?php
echo "  <a class='nav-link collapsed' href='emploi.php?id={$id}'>
<img class='icon' src='../../img/emploi.png' alt=''>
<b class='sidefon' >gerer emplois </b>
</a>";
?>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item ">
<?php
echo "   <a class='nav-link jsf' href='etudient.php?id={$id}'>
<img src='../../img/prof.png' alt=''>
 <b class='sidefon'>afficher liste etudient</b>
</a>";
?>
   
    


<?php 
$content=ob_get_clean();
?>
                       <!--  main -->
<?php
ob_start();
?>
            <h1>liste des notes</h1>

      <form action="export.php?curent=<?=$curent?>" method="post">
        <button class="btn btn-primary mb-3" type="submit" name="export">Export Table</button>
    </form>
<table class="table ">
<thead>
  <tr>
    <th scope="col">ID</th>
    <th scope="col">name</th>
    <th scope="col">note</th>
    
    
      
    
    

    
  </tr>
</thead>
<tbody>

  <?php
  $result=getnote($curent);

  foreach($result as $row){
$id_std=$row["id_student"];
$std=getstudents($id_std);


    echo "<tr>
    <th scope='row'>{$std['id']}</th>
    <td>{$std['name']}</td>
    <td>{$row['note']}</td>
   
    </tr>";
  }
  ?>
</tbody>

<?php 
$main=ob_get_clean();
?>

<?php 
require("../../layout/layoutgestion.php");
?>


