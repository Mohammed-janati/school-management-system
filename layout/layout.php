
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../../styles/bootstrap.min.css">
  <link rel="stylesheet" href="../../styles/sb-admin-2.min.css">
  <link rel="stylesheet" href="../../styles/style.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <script src="../../styles/bootstrap.bundle.min.js"></script>
</head>
<body>

<?= "<div class='d-flex justify-content-between '> $nav <button class='logout btn-primary'><a class='an' href='../../logout.php'>logout</a></button></div>" ?>




    <!-- Page Wrapper -->
    <div id="wrapper">
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion sid" id="accordionSidebar">
<?= $content?>
</ul>



</div>
<script src="../../javascript/javascript.js"></script>

</body>
</html>



