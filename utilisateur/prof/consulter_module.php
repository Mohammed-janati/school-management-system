<?php  
require("../../controller/controller.php");

$user=searchprof($_GET["id"]);

$id=$user["id"];
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

<table class="table ">
<thead>
  <tr>
    <th scope="col">ID</th>
    <th scope="col">name</th>
    <th scope="col">fillier</th>
    
      
    
    

    
  </tr>
</thead>
<tbody>

  <?php
  $result=getmod_prof($id);

  foreach($result as $row){
$id_fil=$row["id_fil"];
$fil=get_fillier($id_fil);


    echo "<tr>
    <th scope='row'>{$row['id']}</th>
    <td>{$row['name']}</td>
    <td>{$fil['name']}</td>
    
   
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