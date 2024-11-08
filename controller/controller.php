<?php

session_start();



include(__DIR__. "/../model/function.php");

function login(){
  include("views/loginlayout.php");}


function verifyuser($email,$password){
 

  $result=searchuser($email,$password);
 var_dump($result);
if ($result) {
  
  
    
      if($email==$result["email"] && $password==$result["pasword"]){
       
        switch($result["rol"]){
          case 0:{ header("location:admin/admin.php?id={$result['id_chef']}"); exit();}
          case 2: {header("location:utilisateur/prof/prof.php?id={$result['id_prof']}"); exit();}
          case 1:{header("location:utilisateur/cord/cord.php?id={$result['id_cord']}"); exit();}
          case 3: {header("location:utilisateur/student/student.php?id={$result['id_student']}"); exit();}
          case 4: {header("location:utilisateur/responsable/responsable.php?id={$result['id_resp']}"); exit();}
        }
      }
  
} else {
  // No rows returned
  $_SESSION["login"]="email or password are incorrect";
  header("location:login.php");
}

}

 

function searchadmin($id){
$result=searchadmine($id);

return $result;

}
function searchcordss(){
$result=searchcordes();

return $result;

}

function getprof(){
  $result=getprofs();

return $result;

}
function getprof_fil($id_fil){
  $result=getprofs_fil($id_fil);

return $result;

}
function getdep($id){
  $result=getdeps($id);

return $result;

}

function getpro($id){
  $result=getpros($id);

return $result;

}

function get_pro($id,$id_fil){
  $result=get_pros($id,$id_fil);

return $result;

}

function ajouterprof(){
$a=0;
  $lastname=$_POST["lastname"];
  $email=$_POST["email"];
  $password=$_POST["password"];
  $departement=$_GET["id_dep"];
  $fillier=$_POST["fillier"];
$result=getprofs();

foreach($result as $row){
if($row["email"]==$email )
 $a=1;
break;

}

if($a==0){
 ajouterprofs($lastname,$email,$password,$departement,$fillier);
 createtable($lastname);
}
 else{
  $_SESSION["exist"]="email already exist";
 }
}

function modifyprof(){
  $id=$_GET["id"];
  $name=$_POST["name"];
  $email=$_POST["email"];
  $password=$_POST["password"];
  $departement=$_GET["id_dep"];
  $fillier=$_POST["fillier"];

modifyprofs($id,$name,$email,$password,$departement,$fillier);

  
}


function deleteprof($id){
  deleteprofs($id);
  
  }
function deletecord($id){
  deletecords($id);
  
  }



function getmodule(){
  $result=getmodules();

return $result;

}
function getfil_mod($id){
  $result=getfil_mods($id);

return $result;

}
function getname_mod($id){
  $result=get_mods($id);

return $result;

}
function getmods($id_fil){
  $result=getmod($id_fil);

return $result;

}
function ajoutermodule(){
$a=0;
$name=filter_input(INPUT_POST,"name",FILTER_SANITIZE_SPECIAL_CHARS);
$id_dep=$_GET["id_dep"];
$fillier=$_POST["fillier"];
$result=getmodule();

foreach($result as $row){
if($row["name"]==$name )
 $a=1;
break;

}
 
if($a==0)
 ajoutermodules($name,$id_dep,$fillier);

 else{
  $_SESSION["exist"]="module already exist";
 }
}
function ajoutermoduless(){
$a=0;
$name=filter_input(INPUT_POST,"name",FILTER_SANITIZE_SPECIAL_CHARS);
$id_dep=$_GET["id_dep"];
$fillier=$_GET["id_fil"];
$result=getmodule();

foreach($result as $row){
if($row["name"]==$name )
 $a=1;
break;

}

if($a==0)
 ajoutermodules($name,$id_dep,$fillier);

 else{
  $_SESSION["exist"]="module already exist";
 }
}



function deletemodule($id){
deletemodules($id);

}
function deletefil($id){
deletefils($id);

}
function modifymodule($id){
  $name=$_POST["name"];
  $fillier=$_POST["fillier"];
  $id_dep=$_GET["id_dep"];
modifymodules($id,$name,$fillier,$id_dep);

}
function modifymodul($id){
  $name=$_POST["name"];
  
  $id_dep=$_GET["id_dep"];
  $fillier=$_GET["id_fil"];
modifymodules($id,$name,$fillier,$id_dep);

}


function get_fillier($id_fil){
  return get_filliers($id_fil);
}

function searchcord($id){
  $result=searchcords($id);
  
  return $result;
  
  }


  function affectermodule(){
    $curent=$_GET["id"];
    $id_prof=$_POST["prof"];
    affectermodules($curent,$id_prof);
  }


 function getstudent($id_fil){
return getstd($id_fil);
  }
 function get_allstudent(){
return get_allstd();
  }
 function getstudents($id){
return getstds($id);
  }
 function getnote($id_fil){
return getnotes($id_fil);
  }

          /* prof */

  function searchprof($id){
   return  searchprofs($id);
  }

 function  getmod_prof($id_prof){
    $result=getmod_profs($id_prof);
return $result;

  }

 function  get_note($curent){

return get_notes($curent);

 }


 function submit_note($key,$values,$id_mod,$id_fil,$year){
 return submit_notes($key,$values,$id_mod,$id_fil,$year);
 }
 function submit_note_m($key,$values){
  submit_notes_m($key,$values);
 }
 
           /*  student */


    function search_student($id){
      return search_students($id);
    }
    function get__notes($id,$idmod){
      return getnotess($id,$idmod);
    }
    function deletestd($id){
      return deletestds($id);
    }


    function get_fil_dep($id_dep){

      return get_fil_deps($id_dep);
    }

    function ajouterstd(){
      $a=0;
        $name=$_POST["name"];
        $email=$_POST["email"];
        $password=$_POST["password"];
        $departement=$_GET["id_dep"];
        $fillier=$_POST["fillier"];
      $result=get_allstudent();
      
      foreach($result as $row){
      if($row["email"]==$email )
       $a=1;
      break;
      }
      
      if($a==0)
       addstd($name,$email,$password,$departement,$fillier);
      
       else{
        $_SESSION["exist"]="email already exist";
       }
      }


      function modifystd($curent){
        
          $name=$_POST["name"];
          $email=$_POST["email"];
          $password=$_POST["password"];
          $departement=$_GET["id_dep"];
          $fillier=$_POST["fillier"];

         modifystds($curent,$name,$email,$password,$departement,$fillier);

        }


   
    function ajoutercord(){
      $a=0;
        $name=$_POST["name"];
        $email=$_POST["email"];
        $password=$_POST["password"];
        $departement=$_GET["id_dep"];
        $fillier=$_POST["fillier"];
      $result=searchcordss();
      
      foreach($result as $row){
      if($row["email"]==$email )
       $a=1;
      break;
      
      }
      
      if($a==0)
       addcord($name,$email,$password,$departement,$fillier);
      
       else{
        $_SESSION["exist"]="email already exist";
       }
      }

    function modifycord($curent){
     
        $name=$_POST["name"];
        $email=$_POST["email"];
        $password=$_POST["password"];
        $departement=$_GET["id_dep"];
        $fillier=$_POST["fillier"];
     
      
       modifycords($curent,$name,$email,$password,$departement,$fillier);
     
      }


function searchfil(){
  return searchfils();
}

      function ajouterfil(){
        $a=0;
          $name=filter_input(INPUT_POST,"name",FILTER_SANITIZE_SPECIAL_CHARS);;
          
          $departement=$_GET["id_dep"];
        $result=searchfil();
        
        foreach($result as $row){
        if($row["name"]==$name )
         $a=1;
        break;
        
        }
        
        if($a==0){
         addfil($name,$departement);
         $id_fil=getid_fil($name); ///////
         $fillier=get_fillier($id_fil["id"]);
         $fil=str_replace(' ', '', $fillier["name"]);
         
         createtable($fil);
         add_infil_emploi($fil,$id_fil);
        }else{
          $_SESSION["exist"]="email already exist";
         }
        }


                            /* emploi*/

    function  ajouterEMP(){
      $a=0;
      $jour=$_POST["jour"];
      $module=$_POST["module"];
      $horaire=$_POST["horaire"];
      $salle=$_POST["salle"];
      $type=$_POST["type"];

      $id=$_GET["id"];
$id_dep=$_GET['id_dep'];
$id_fil=$_GET["curent"];
      $fillier=get_fillier($id_fil);
      $fil=str_replace(' ', '', $fillier["name"]);

      $tests= getemploi("emploi".$fil,$jour);
      foreach($tests as $test){
      if($test["horaire"]==$horaire && $test["jour"]==$jour){
        $a=1;
        $_SESSION["horaire"]="cette heure et occuper";
        unset( $_SESSION["succes"]);
      }}
      if($a==0){
      remplir($jour,$module,$horaire,$salle,$type,$fil);
      $_SESSION["succes"]="module added successfully";
      unset( $_SESSION["horaire"]);}

    }


    function  ajouterEMPP(){
      $a=0;
      $jour=$_POST["jour"];
      if(isset($_POST["module"]))
      $module=$_POST["module"];
    else       $module=" ";

      $horaire=$_POST["horaire"];
      $salle=$_POST["salle"];
      $type=$_POST["type"];


$nom=$_GET["curent"];
      

      $tests= getemploi("emploi".$nom,$jour);
      foreach($tests as $test){
      if($test["horaire"]==$horaire && $test["jour"]==$jour){
        $a=1;
        $_SESSION["horaire"]="cette heure et occuper";
        unset( $_SESSION["succes"]);
      }}
      if($a==0){
      remplir($jour,$module,$horaire,$salle,$type,$nom);
      $_SESSION["succes"]="module added successfully";
      unset( $_SESSION["horaire"]);}

    }


    function  modifyEMP(){
      unset($_SESSION);
      $a=0;
      $jour=$_POST["jour"];
      $module=$_POST["module"];
      $horaire=$_POST["horaire"];
      $salle=$_POST["salle"];
      $type=$_POST["type"];

      $id=$_GET["id"];
    $id_fil=$_GET["curent"];
      $fillier=get_fillier($id_fil);
      $fil=str_replace(' ', '', $fillier["name"]);

      $tests= getemploi("emploi".$fil,$jour);
      foreach($tests as $test){

      if($test["horaire"]==$horaire && $test["jour"]==$jour){
        modifyempl($jour,$module,$horaire,$salle,$type,$fil);
        $_SESSION["succes"]="module modified successfully";
        unset( $_SESSION["horaire"]);

       $a==1; break;
       
      }}
     if($a==0){
     
      unset( $_SESSION["succes"]);
     }
     
    }


    function  modifyEMPP(){
      unset($_SESSION);
      $a=0;
      $jour=$_POST["jour"];
      if(isset($_POST["module"]))
      $module=$_POST["module"];
    else       $module=" ";

      $horaire=$_POST["horaire"];
      $salle=$_POST["salle"];
      $type=$_POST["type"];

     
    $nom=$_GET["curent"];
     

      $tests= getemploi("emploi".$nom,$jour);
      foreach($tests as $test){

      if($test["horaire"]==$horaire && $test["jour"]==$jour){
        modifyempl($jour,$module,$horaire,$salle,$type,$nom);
        $_SESSION["succes"]="module modified successfully";
        unset( $_SESSION["horaire"]);

       $a==1; break;
       
      }}
     if($a==0){
     
      unset( $_SESSION["succes"]);
     }
     
    }


   function  get_nom_emploi($id_fil){

    return get_nom_emplois($id_fil);
   }
   function  getemploi($empl,$i){

    return getemplois($empl,$i);
   }



   function  deleteEMP(){
    
    $jour=$_POST["jour"];
    $horaire=$_POST["horaire"];
    

   
$id_fil=$_GET["curent"];
    $fillier=get_fillier($id_fil);
    $fil=str_replace(' ', '', $fillier["name"]);

   
    deleteempl($jour,$horaire,$fil);
   }
   function  deleteEMPP(){
    
    $jour=$_POST["jour"];
    $horaire=$_POST["horaire"];
    

   
$nom=$_GET["curent"];
  
   
    deleteempl($jour,$horaire,$nom);
   }

?> 