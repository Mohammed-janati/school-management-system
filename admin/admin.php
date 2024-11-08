<?php  
require("../controller/controller.php");

$user=searchadmin($_GET["id"]);
$id= $user["id"];
$id_dep=$user["id_dep"];
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


<!-- side bar-->
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


<?php ob_start()?>
<div class="row">

<?php
$a=["gerer module"=>"gerer_module.php?id={$id}&id_dep={$id_dep}",
"gerer prof"=>"gerer_prof.php?id={$id}&id_dep={$id_dep}",
"gerer coordinateur"=>"gerer_cord/cord.php?id={$id}&id_dep={$id_dep}",
"gerer etudient"=>"gerer_student/student.php?id={$id}&id_dep={$id_dep}",
"gerer fillier"=>"gerer_fillier/fillier.php?id={$id}&id_dep={$id_dep}"

];



foreach($a as $key=>$value){
echo"
<div class='col-xl-3 col-md-6 mb-4'>
                            <div class='card border-left-primary shadow h-100 py-2'>
                                <div class='card-body'>
                                    <div class='row no-gutters align-items-center'>
                                        <div class='col mr-2'>
                                            <a href=$value class=' font-weight-bold text-primary text-uppercase mb-1' style='cursor:pointer'>
                                                $key</a>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
";
        }        ?>
</div>
 <?php $main= ob_get_clean()?>



<?php
require("../layout/layoutgestion.php");
?>