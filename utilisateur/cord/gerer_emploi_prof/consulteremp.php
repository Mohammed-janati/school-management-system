

<?php
$id=$_GET["id"];
$id_dep=$_GET['id_dep'];
$id_fil=$_GET["curent"];
require("../../../controller/controller.php");


?>
                      <!-- navbar-->
 <?php ob_start();
  ?>

<nav class="navbar navbar-light bg-primary navbar_me">
  <span class="navbar-brand mb-0 h1 text-white">liste des etudient</span>
</nav>

<?php $nav=ob_get_clean();
  ?>
                      <!-- end navbar-->

                      <!--  sidebar--> 
<?php ob_start();
  ?>


<!-- side bar-->
<?php
echo " <a class='sidebar-brand d-flex align-items-center justify-content-center' href='../cord.php?id={$id}'>
<div class='sidebar-brand-icon rotate-n-15 logo'>
<img src='../../../img/logo.png' alt='logo'>
<b>gestion de note</b>
</div></a>";
?>






<!-- Nav Item - Dashboard -->
<li class="nav-item ">
<?php
echo "  <a class='nav-link' href='../cord.php?id={$id}'>
<img  src='../../../img/home.png' alt=''>
<b class='dashfont'>Dashboard</b></a>";
?>
   
</li>

<!-- Divider -->




<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
<?php
echo "  <a class='nav-link collapsed' href='../consulter_module.php?id={$id}'>
<img class='iconm' src='../../../img/module.png' alt=''>
<b class='sidefon' >consulter module </b>
</a>";
?>
    
    
</li>
<li class="nav-item">
<?php
echo "  <a class='nav-link collapsed' href='../note.php?id={$id}'>
<img class='iconm' src='../../../img/module.png' alt=''>
<b class='sidefon' >afficher notes </b>
</a>";
?>
    
    
</li>





<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item ">
<?php
echo "   <a class='nav-link jsf' href='../etudient.php?id={$id}'>
<img src='../../../img/prof.png' alt=''>
 <b class='sidefon'>afficher liste etudient</b>
</a>";
?>
  
</li>

<li class="nav-item">
<?php
echo "  <a class='nav-link collapsed' href='../emploi.php?id={$id}'>
<img class='icon' src='../../../img/emploi.png' alt=''>
<b class='sidefon' >gerer emplois </b>
</a>";
?>
</li>

<?php 
$content=ob_get_clean();
?>

<?php
ob_start();
?>



<table class="table table-bordered emp">
  <thead>
    <tr>
      <th scope="col">day</th>
      <th scope="col">8:30->9:30</th>
      <th scope="col">9:30->10:30</th>
      <th scope="col">10:30->11:30</th>
      <th scope="col">11:30->12:30</th>
      <th scope="col">2:30->3:30</th>
      <th scope="col">3:30->4:30</th>
      <th scope="col">4:30->5:30</th>
      <th scope="col">5:30->6:30</th>
    </tr>
  </thead>
  <tbody>
    <?php


    for ($i = 1; $i <= 6; $i++) {
   
      $results = getemploi("emploi".$id_fil, $i);
    
      foreach ($results as $row) {
        // Access individual row values
        $jour = $row["jour"];
        $type = $row["type"];
        $salle = $row["salle"];
        $module = $row["module"];
        $horaire = $row["horaire"];
        $aray[$horaire]=$module;
      }

      switch ($i) {
        case 1:
            $jour = "lundi";
            break;
        case 2:
            $jour = "mardi";
            break;
        case 3:
            $jour = "mercredi";
            break;
        case 4:
            $jour = "jeudi";
            break;
        case 5:
            $jour = "vendredi";
            break;
        case 6:
            $jour = "samedi";
            break;
        default:
            $jour = " ";
            break;
    }
        // Output the table row
        echo "<tr>";
        echo "<th scope='row'><b>$jour</b></th>";
        
        
        for ($j = 1; $j <= 8; $j++) {
            // Check if the module exists for this index
            if (isset($aray[$j])) {
             $module= getname_mod($aray[$j]);
  if($type==1) $types="cours";
  else if($type==2) $types="td/tp";
  if(empty($module)) $module["name"]="";


                echo "<td><b>$types</b>(salle$salle)<br>{$module["name"]}</td>";
            } else {
                echo "<td> </td>"; 
            }
        }
    
      
      unset($result);
      unset($aray);
  }
  
   ?>
  </tbody>
</table>


<?php
$main=ob_get_clean();
?>
<?php
require("../../../layout/layoutgestion.php");
?>
