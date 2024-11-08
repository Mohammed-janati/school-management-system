

<?php
$id=$_GET["id"];
$id_dep=$_GET["id_dep"];

require(__DIR__."/../controller/controller.php");
$_SESSION["int"]=null;
$_SESSION["exist"]=null;
$_SESSION["succes"]=null;

if(isset($_POST["submit"]) && !empty($_POST["email"]) && !empty($_POST["password"])){
   $email=filter_input(INPUT_POST,"email",FILTER_VALIDATE_EMAIL);
  $password=filter_input(INPUT_POST,"password",FILTER_SANITIZE_SPECIAL_CHARS);
  
  ajouterprof($email,$password);

$_SESSION["succes"]="prof added successfully";
} else if(isset($_POST["submit"]) && (empty($_POST["password"]) || empty($_POST["email"]))){
  $_SESSION["int"]="all fields are required";
  header("location:ajouterprof.php?id= $id&id_dep=$id_dep");
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
            <form action="ajouterprof.php?id=<?= $id?>&id_dep=<?= $id_dep?>" method="post">

              <div class="row">
                
                <div class="col-md-6 mb-4">

                  <div data-mdb-input-init class="form-outline">
                      <label class="form-label" for="lastName">Last Name</label>
                      <input type="text" id="lastName" name="lastname" class="form-control form-control-lg" />
                  </div>

                </div>
              </div>
              

              

              <div class="row">
                <div class="col-md-6 mb-4 pb-2">

                  <div data-mdb-input-init class="form-outline">
                  <label class="form-label" for="emailAddress">Email</label>

                    <input type="email" id="emailAddress" name="email" class="form-control form-control-lg" />
                  </div>

                </div>
                
              </div>

              <div class="row">
                
                <div class="col-md-6 mb-4">

                  <div data-mdb-input-init class="form-outline">
                      <label class="form-label" for="password">password</label>
                      <input type="password" id="password" name="password" class="form-control form-control-lg" />
                  </div>

                </div>
              </div>


              

              <div class="row">
                <div class="col-12">
                <label class="form-label select-label">filliere</label>
            <br>
                  <select name="fillier" class="select form-control-lg">
                    <option  disabled>Choose option</option>
                    <?php
                    $result=get_fil_dep($id_dep);
                    foreach($result as $row){
                      $fil=get_fillier($row['id_fil']);
                    echo " 
                    <option value={$row['id_fil']}>{$fil['name']}</option>";
                    }
                    ?></select>

                </div>
              </div>

              <div class="d-flex">
              <div class="mt-4 pt-2">
                <input class="btn btn-primary btn-lg" type="submit" name="submit" value="Submit" />
              </div>

              <a href="gerer_prof.php?id=<?= $id?>&id_dep=<?= $id_dep?>">
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
require(__DIR__."/../layout/ajouter.php");
?>
