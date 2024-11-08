<?php



class database{
public $con;

public function __construct($database,$user="root",$pass=""){
$dsn=http_build_query($database,'',';');
$dsn="mysql:".$dsn;
try{
$this->con=new PDO($dsn,$user,$pass,[PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);
} catch(PDOException){
  die("<br>erreur connection to db");
}

}

public function query($query,$par=[]){
  
  $statement=$this->con->prepare($query);
  $statement->execute($par);
 
  return $statement;
}

};

?>
