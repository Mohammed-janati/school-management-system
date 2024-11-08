<?php  
require("../../controller/controller.php");
$id=$_GET["id"];
$curent=$_GET["curent"];

?>




                      <!-- navbar-->
 <?php ob_start();
  ?>

<nav class="navbar navbar-light bg-primary navbar_me">
  <span class="navbar-brand mb-0 h1 text-white">sasie note </span>
</nav>

<?php $nav=ob_get_clean();
  ?>
                      <!-- end navbar-->

<!--                       sidebar--> 
<?php ob_start();
  ?>


<!-- side bar-->
<?php
echo " <a class='sidebar-brand d-flex align-items-center justify-content-center' href='prof.php?id={$id}'>
<div class='sidebar-brand-icon rotate-n-15 logo'>
<img src='../../img/logo.png' alt='logo'>
<b>gestion de note</b>
</div></a>";
?>






<!-- Nav Item - Dashboard -->
<li class="nav-item ">
<?php
echo "  <a class='nav-link' href='prof.php?id={$id}'>
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
<img class='icon' src='../../img/note.png' alt=''>
<b class='sidefon' >saisir notes </b>
</a>";
?>
    
    
</li>






<?php 
$content=ob_get_clean();
?>
                                  <!--  main -->
<?php
ob_start();
?>
<?php if(isset($_SESSION["valid"])) :?>
              <span class="alert alert-success"><?= isset($_SESSION["valid"])?  $_SESSION["valid"]:"" ?></span>
        <?php endif;?> 
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

  $result=get_note($curent);

  foreach($result as $row){
$id_std=$row["id_student"];
$student=getstudents($id_std);


    echo "<tr>
    <th scope='row'>{$row['id']}</th>
    <td>{$student['name']}</td>
    
    <td>
    <form method='post' action='submitmod.php?id=$id&curent=$curent'>
    <input class='bord' type='number' min=0 max=20 name={$student['id']} value={$row['note']}>
</form>
    </td>
    
   
    </tr>";
  }
  ?>
</tbody>

<button class="btn btn-primary" onclick="submitAllForms()">Submit</button>
<?php 
$main=ob_get_clean();
?>


<?php 
require("../../layout/layoutgestion.php");
?>