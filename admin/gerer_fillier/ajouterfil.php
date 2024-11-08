

<?php
$id=$_GET["id"];
$id_dep=$_GET["id_dep"];

require("../../controller/controller.php");

if(isset($_POST["submit"]) && !empty($_POST["name"]) ){
  
  ajouterfil();

$_SESSION["succes"]="fillier ajouter avec succes";
unset($_SESSION["exist"]);
} 

?>


<?php
ob_start();
?>



<section class="vh-150  gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>

            

      

      <?php if(isset($_SESSION["succes"])) :?>
              <span class="alert alert-success"><?= isset($_SESSION["succes"])?  $_SESSION["succes"]:"" ?></span>
        <?php endif;?> 
         
              <?php if(isset($_SESSION["exist"])):?>
              <span class="alert alert-danger"><?= isset($_SESSION["exist"])?  $_SESSION["exist"]:"" ?></span>
            
              <?php endif;?>
            <form action="ajouterfil.php?id=<?= $id?>&id_dep=<?= $id_dep?>" method="post">

              <div class="row">
                
                <div class="col-md-6 mb-4">

                  <div data-mdb-input-init class="form-outline">
                      <label class="form-label" for="lastName">Nom du filliere</label>
                      <input type="text" id="lastName" name="name" class="form-control form-control-lg" />
                  </div>

                </div>
              </div>
              

              

              
              


              

              

              <div class="d-flex">
              <div class="mt-4 pt-2">
                <input class="btn btn-primary btn-lg" type="submit" name="submit" value="Submit" />
              </div>

              <a href="fillier.php?id=<?= $id?>&id_dep=<?= $id_dep?>">
              <div class="ml-2 mt-4 pt-2 ">
                <input class="btn btn-danger btn-lg w-20"  name="annuler" value="annuler" />
              </div></a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



<?php
$main=ob_get_clean();
?>
<?php
require("../../layout/ajouter.php");
?>
