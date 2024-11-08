
<?php
require("../../controller/controller.php");

if (isset($_POST['export'])) {
  // Set headers to force download
  header('Content-Type: text/csv; charset=utf-8');
  header('Content-Disposition: attachment; filename=data.csv');

  // Create a file pointer connected to the output stream
  $output = fopen('php://output', 'w');

  // Write header row
  fputcsv($output, ["id", "name","note"],";");

  $result=getnote($_GET['curent']);

foreach($result as $row){
$id_std=$row["id_student"];
$std=getstudents($id_std);

fputcsv($output, array($std['id'], $std['name'],$row['note']),";");
  
}
  // Close the file pointer
  fclose($output);

  // Prevent further execution
 
  exit();
}

?>