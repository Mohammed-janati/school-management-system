<?php  
require("../../controller/controller.php");

$user=searchcord($_GET["id"]);

$id=$user["id"];     /* id cordinateur */
$id_fil=$user["id_fil"];
$id_dep=$user["id_dep"];
?>




                      <!-- navbar-->
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



<li class="nav-item">
<?php
echo "  <a class='nav-link collapsed' href='emploi.php?id={$id}'>
<img class='iconm' src='../../img/emploi.png' alt=''>
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
  
</li>



<?php 
$content=ob_get_clean();
?>
                       <!--  main -->
                       <?php
ob_start();
?>
<h1>emploi du filliere</h1>
<table class="table ">
<thead>
  <tr>
    <th scope="col">ID</th>
    <th scope="col">filliere</th>
    
    <th scope="col">action</th>
    <th scope="col"></th>
      
  </tr>
</thead>
<tbody>

  <?php


 
  $fil=get_fillier($id_fil);



    echo "<tr>
    <th scope='row'>{$id_fil}</th>
    <td>{$fil['name']}</td>
    
    <td>
    <div class='d-flex'>
            <a href='ajouteemp.php?curent=$id_fil&id=$id&id_dep=$id_dep' class='btn btn-primary mb-2 mr-2 '>remplir</a>
            <a href='modifyemp.php?curent=$id_fil&id=$id&id_dep=$id_dep' class='btn btn-warning mb-2 mr-2 text-black'>modify</a>
            <a href='consulteremp.php?curent=$id_fil&id=$id&id_dep=$id_dep' class='btn btn-warning mb-2 mr-2 text-black'>consulter</a>
            <a href='deleteemp.php?curent=$id_fil&id=$id&id_dep=$id_dep' class='btn btn-danger mb-2 mr-2 text-black'>suprimer heure</a>
            </div>

    </td>
    </tr>";
  
  ?>
</tbody>
</table>
<br>
<h2>emploi des prof</h2>

<table class="table ">
<thead>
  <tr>
    <th scope="col">ID</th>
    <th scope="col">prof</th>
    
    <th scope="col">action</th>
    <th scope="col"></th>
      
  </tr>
</thead>
<tbody>

  <?php


 
  $results=getprof_fil($id_fil);

foreach($results as $result){

    echo "<tr>
    <th scope='row'>{$result['id']}</th>
    <td>{$result['name']}</td>
    
    <td>
    <div class='d-flex'>
            <a href='gerer_emploi_prof/ajouteemp.php?curent={$result['name']}&id=$id&id_dep=$id_dep' class='btn btn-primary mb-2 mr-2 '>remplir</a>
            <a href='gerer_emploi_prof/modifyemp.php?curent={$result['name']}&id=$id&id_dep=$id_dep' class='btn btn-warning mb-2 mr-2 text-black'>modify</a>
            <a href='gerer_emploi_prof/consulteremp.php?curent={$result['name']}&id=$id&id_dep=$id_dep' class='btn btn-warning mb-2 mr-2 text-black'>consulter</a>
            <a href='gerer_emploi_prof/deleteemp.php?curent={$result['name']}&id=$id&id_dep=$id_dep' class='btn btn-danger mb-2 mr-2 text-black'>suprimer heure</a>
            </div>

    </td>
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