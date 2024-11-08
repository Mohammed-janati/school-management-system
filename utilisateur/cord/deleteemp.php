

<?php
$id=$_GET["id"];
$id_dep=$_GET['id_dep'];
$id_fil=$_GET["curent"];
require("../../controller/controller.php");

if(isset($_POST["submit"]) ){ 
  deleteEMP();
  $_SESSION["succes"]="heure est librer avec succes";
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
         
       
            <form action="deleteemp.php?id=<?= $id?>&id_dep=<?= $_GET["id_dep"]?>&curent=<?= $id_fil?>" method="post">

           

            <div class="row">
                <div class="col-12">
                <label class="form-label select-label">jour</label>
            <br>
                  <select name="jour" class="select form-control-lg">
                    <option  disabled>Choose option</option>
                  
                   
                    <option value=1>lundi</option>
                    <option value=2>mardi</option>
                    <option value=3>mercredi</option>
                    <option value=4>jeudi</option>
                    <option value=5>vendredi</option>
                    <option value=6>samedi</option>
                   </select>

                </div>
              <!--   module -->
              <br>
              </div>

             
              
              <div class="row">
                <div class="col-12">
                <label class="form-label select-label">horaire</label>
            <br>
                  <select name="horaire" class="select form-control-lg">
                  <option  disabled>Choose option</option>
                  
                   
                  <option value=1>8:30->9:30</option>
                  <option value=2>9:30->10:30</option>
                  <option value=3>10:30->11:30</option>
                  <option value=4>11:30->12:30</option>
                  <option value=5>2:30->3:30</option>
                  <option value=6>3:30->4:30</option>
                  <option value=6>4:30->5:30</option>
                  <option value=6>5:30->6:30</option>
                </select>

                </div>
              </div>
              





            
                
              

              

              


              
        

              <div class="d-flex">
              <div class="mt-4 pt-2">
                <input class="btn btn-primary btn-lg" type="submit" name="submit" value="Submit" />
              </div>

              <a href="emploi.php?id=<?= $id?>&id_dep=<?= $id_dep?>&curent=<?= $id_fil?>">
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
