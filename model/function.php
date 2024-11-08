<?php

$config=include(__DIR__."/../configuration/configuration.php");
$database=$config["database"];
include(__DIR__."/../configuration/class.php");

function searchuser($email,$password){
  global $database;
$db=new database($database);
$result= $db->query("select * from users where email=? and pasword=?",[$email,$password])->fetch();
return $result;
}

function searchadmine($id){
  global $database;
$db=new database($database);
$result= $db->query("select * from chef where id=? ",[$id])->fetch();
return $result;
}
function searchcordes(){
  global $database;
$db=new database($database);
$result= $db->query("select * from cord  ")->fetchAll();
return $result;
}

function getdeps($id){
  global $database;
$db=new database($database);
$result= $db->query("select * from departement where id=? ",[$id])->fetch();
return $result;
}
function getprofs(){
  global $database;
$db=new database($database);
$result= $db->query("select * from prof  ")->fetchAll();
return $result;
}
function getprofs_fil($id_fil){
  global $database;
$db=new database($database);
$result= $db->query("select * from prof where id_fil=? ",[$id_fil])->fetchAll();
return $result;
}
function get_filliers($id){
  global $database;
$db=new database($database);
$result= $db->query("select name from fillier where id=?  ",[$id])->fetch();
return $result;
}
function getmodules(){
  global $database;
$db=new database($database);
$result= $db->query("select * from module  ")->fetchAll();
return $result;
}
function getmod($id_fil){
  global $database;
$db=new database($database);
$result= $db->query("select * from module where id_fil=? ",[$id_fil])->fetchAll();
return $result;
}


function ajouterprofs($name,$email,$password,$departement,$fillier){
  global $database;
$db=new database($database);

 $db->query("insert into prof(name,email,id_dep,id_fil) values(?,?,?,?)",[$name,$email,$departement,$fillier]);
 $result=$db->query("SELECT id FROM prof WHERE email = ?",[$email])->fetch();

 $db->query("insert into users(email,pasword,rol,id_prof) values(?,?,?,?)",[$email,$password,2,$result["id"]]);

}
function ajoutermodules($name,$departement,$fillier){
  global $database;
$db=new database($database);

 $db->query("insert into module(name,id_dep,id_fil) values(?,?,?)",[$name,$departement,$fillier]);

}


function deleteprofs($id){
  global $database;
  $db=new database($database);
  $pro=$db->query("select name from prof where id=?",[$id])->fetch();
  $db->query("delete from prof where id=?",[$id]);
  $db->query("drop table emploi".$pro["name"]);

}



function deletestds($id){
  global $database;
  $db=new database($database);
  $db->query("delete from student where id=?",[$id]);
}
function deletecords($id){
  global $database;
  $db=new database($database);
  $db->query("delete from cord where id=?",[$id]);
}

function deletemodules($id){
  global $database;
  $db=new database($database);
  $db->query("delete from module where id=?",[$id]);
} 
function deletefils($id){
  global $database;
  $db=new database($database);
  $db->query("delete from fillier where id=?",[$id]);
} 

function searchfils(){
  global $database;
$db=new database($database);
$result= $db->query("select * from fillier ")->fetchAll();
return $result;
}

function addfil($name,$departement){
  global $database;
  $db=new database($database);
  $db->query("insert into fillier(name) values(?) ",[$name]);

  $result=$db->query("SELECT id FROM fillier WHERE name = ?",[$name])->fetch();

  $db->query("insert into dep_fil(id_dep,id_fil) values(?,?) ",[$departement,$result["id"]]);


}

function getpros($id){
  global $database;
$db=new database($database);
$result= $db->query("select * from prof where id=? ",[$id])->fetch();
return $result;
}
function get_pros($id,$id_fil){
  global $database;
$db=new database($database);
$result= $db->query("select * from prof where id=? and id_fil=? ",[$id,$id_fil])->fetch();
return $result;
}


function modifyprofs($id,$lastname,$email,$password,$departement,$fillier){
  global $database;
  $db=new database($database);
$db->query("UPDATE prof
SET name = ?,
 email = ?,
 id_dep = ?,
 id_fil = ?

WHERE id = ?;",[$lastname,$email,$departement,$fillier,$id]);

$db->query("UPDATE users
SET pasword = ?
WHERE id_prof = ?;",[$password,$id]);

}


function modifymodules($id,$name,$fillier,$id_dep){
  global $database;
  $db=new database($database);
  $db->query("UPDATE module
  SET name = ?,
   id_dep = ?,
   id_fil = ?
  WHERE id = ?;",[$name,$id_dep,$fillier,$id]);
}

/* cordinateur function 
 */

 function searchcords($id){
  global $database;
$db=new database($database);
$result= $db->query("select * from cord where id=? ",[$id])->fetch();
return $result;
}

function affectermodules($curent,$id_prof){
  global $database;
$db=new database($database);
$db->query("UPDATE module
SET id_prof =?
WHERE id=?;
 ",[$id_prof,$curent]);
 
}
function getstd($id_fil){
  global $database;
$db=new database($database);
return $db->query("select * from student where id_fil=? order by annee",[$id_fil])->fetchAll();
 
}
function getstds($id_fil){
  global $database;
$db=new database($database);
return $db->query("select * from student where id=? ",[$id_fil])->fetch();
 
}
function getnotes($curent){
  global $database;
$db=new database($database);
return $db->query("select * from note where id_mod=? ",[$curent])->fetchAll();
  
}

           /*  prof */
function searchprofs($id){
  global $database;
$db=new database($database);
return $db->query("select * from prof where id=? ",[$id])->fetch();
  
}
function getmod_profs($id_prof){
  global $database;
$db=new database($database);
$result= $db->query("select * from module where id_prof=? ",[$id_prof])->fetchAll();
return $result;
}
function getfil_mods($id){
  global $database;
$db=new database($database);
$result= $db->query("select id_fil from module where id=? ",[$id])->fetch();
return $result;
}
function get_mods($id){
  global $database;
$db=new database($database);
$result= $db->query("select name from module where id=? ",[$id])->fetch();
return $result;
}

function get_notes($curent){
  global $database;
$db=new database($database);
$result= $db->query("select * from note where id_mod=? ",[$curent])->fetchAll();
return $result;
}


function submit_notes($key,$values,$id_mod,$id_fil,$year){
  global $database;
  $db=new database($database);

  if($db->query("select * from note where id_student=? and id_mod=? and id_fil=? and annee=?",[$key,$id_mod,$id_fil,$year])->fetch())
  return "note already affected try to modify it";
  else{$db->query("insert into note(note,id_student,id_mod,id_fil,annee) values(?,?,?,?,?)",[$values,$key,$id_mod,$id_fil,$year]);
   return "note inserted succefully";}
}
function submit_notes_m($key,$values){
  global $database;
  $db=new database($database);
  $db->query("update note set  note= ? where id_student=? ",[$values,$key]);

}

                   /*  student */
function search_students($id){
  global $database;
  $db=new database($database);
 return $db->query("select * from student where id=? ",[$id])->fetch();

}
function get_allstd(){
  global $database;
  $db=new database($database);
 return $db->query("select * from student ")->fetchAll();

}
function getnotess($id,$idmod){
  global $database;
  $db=new database($database);
  return $db->query("select note from note where id_student=? and id_mod=? ",[$id,$idmod])->fetch();

}
function get_fil_deps($id_dep){
  global $database;
  $db=new database($database);
  return $db->query("select id_fil from dep_fil where id_dep=? ",[$id_dep])->fetchAll();

}



function addcord($name,$email,$password,$departement,$fillier){

  global $database;
  $db=new database($database);
 $db->query("insert into cord(name,email,id_fil,id_dep) values
  (?,?,?,?) ",[$name,$email,$fillier,$departement]);

  $result=$db->query("select id from cord where email=? ",[$email])->fetch();

  $db->query("insert into users(email,pasword,rol,id_cord) values
  (?,?,?,?) ",[$email,$password,1,$result['id']]);
}
function addstd($name,$email,$password,$departement,$fillier){

  global $database;
  $db=new database($database);
 $db->query("insert into student(name,email,id_fil) values
  (?,?,?) ",[$name,$email,$fillier]);

  $result=$db->query("select id from student where email=? ",[$email])->fetch();

  $db->query("insert into users(email,pasword,rol,id_student) values
  (?,?,?,?) ",[$email,$password,3,$result['id']]);
}


function modifycords($curent,$name,$email,$password,$departement,$fillier){

  global $database;
  $db=new database($database);
 $db->query("UPDATE cord
 SET name = ?,
  email = ?,
  id_fil = ?,
  id_dep=?
 WHERE id = ?;",[$name,$email,$fillier,$departement,$curent]);

  $db->query("UPDATE users
  SET email = ?,
   pasword = ?
   
  WHERE id_cord = ?;",[$email,$password,$curent]);
}

function modifystds($curent,$name,$email,$password,$departement,$fillier){

  global $database;
  $db=new database($database);
 $db->query("UPDATE student
 SET name = ?,
  email = ?,
  id_fil = ?
 
 WHERE id = ?;",[$name,$email,$fillier,$curent]);

  $db->query("UPDATE users
  SET email = ?,
   pasword = ?
   
  WHERE id_student = ?;",[$email,$password,$curent]);
}

                      /* emploi
 */


function createtable($fillier){

  global $database;
  $db=new database($database);
 $db->query("CREATE TABLE emploi".$fillier. "(
  jour INT PRIMARY KEY,
  module int ,
  horaire int ,
  salle int,
  type int 
);
");

}


function remplir($jour,$module,$horaire,$salle,$type,$fil){
  global $database;
  $db=new database($database);
 $db->query("insert into emploi".$fil."(jour,module,horaire,salle,type) values (?,?,?,?,?)",[$jour,$module,$horaire,$salle,$type]);
}


function modifyempl($jour,$module,$horaire,$salle,$type,$fil){
  global $database;
  $db=new database($database);
 $db->query("UPDATE emploi".$fil."
 SET jour = ?,
  module = ?,
  horaire = ?,
  salle = ?,
  type = ?
  
 WHERE jour = ? and horaire=?;",[$jour,$module,$horaire,$salle,$type,$jour,$horaire]);
}

function getid_fil($name){
  global $database;
  $db=new database($database);
 return $db->query("select id from fillier where name= ?",[$name])->fetch();
}
function add_infil_emploi($fil,$id_fil){
  global $database;
  $db=new database($database);
$db->query("insert into emploi_fil values(?,?)",[$id_fil,"emploi".$fil]);
}
function get_nom_emplois($id_fil){
  global $database;
  $db=new database($database);
return $db->query("select emploi from emploi_fil where id_fil=?",[$id_fil])->fetch();
}

function getemplois($empl,$i){
  global $database;
  $db=new database($database);
return $db->query("select * from " .$empl." where jour=?",[$i] )->fetchAll();
}
function deleteempl($jour,$horaire,$fil){
  global $database;
  $db=new database($database);
 $db->query("delete  from emploi" .$fil." where jour=? and horaire=? ",[$jour,$horaire] );
}
?>
