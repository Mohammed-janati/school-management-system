
<?php  
require("../../controller/controller.php");


$id= $_GET["id"];
?>

<?php ob_start();
  ?>


<nav class="navbar navbar-light bg-primary navbar_me">
  


  
  <span class="navbar-brand mb-0  text-white ">
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
echo " <a class='sidebar-brand d-flex align-items-center justify-content-center' href='student.php?id={$id}'>
<div class='sidebar-brand-icon rotate-n-15 logo'>
<img src='../../img/logo.png' alt='logo'>
<b>gestion de note</b>
</div></a>";
?>






<!-- Nav Item - Dashboard -->
<li class="nav-item ">
<?php
echo "  <a class='nav-link ' href='student.php?id={$id}'>
<img  src='../../img/home.png' alt=''>
<b class='dashfont'>Dashboard</b></a>";
?>
   
</li>

<!-- Divider -->




<!-- Nav Item - Pages Collapse Menu -->

<li class="nav-item">
<?php
echo "  <a class='nav-link collapsed' href='note.php?id={$id}'>
<img class='icon' src='../../img/note.png' alt=''>
<b class='sidefon' >consulter notes </b>
</a>";
?>
    
</li>

<?php 
$content=ob_get_clean();?>

<?php
$a=[
"consulter note"=>"note.php?id={$id}"

];

foreach($a as $key=>$value){
echo"
<div class='col-xl-5 col-md-6 mb-4'>
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
require("../../layout/layoutgestion.php");
?>