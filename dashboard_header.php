<!DOCTYPE html>

<?php
// admin email : test@gmail.com
// admin password : test1234
    session_start();
    if (!isset($_SESSION['admin_name'])) {
       header("location:login.php");
       exit;
    }
    if (isset($_GET['logout'])) {
       session_destroy();
       header("location:login.php");
       exit;
    }
  include("url_access.php");

     include("conn.php");
   
    $admin_name= $_SESSION['admin_name'];
     $admin_query  = "SELECT name, image_path FROM admin_dashboard where name= '$admin_name'";
     $stmt = $connect->query($admin_query );  
     if ($stmt->num_rows>0) {
      $data = $stmt->fetch_assoc();
      $image_path=$data['image_path'];
      $name=$data['name'];
     }
     ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/css/bootstrap-switch-button.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/dist/bootstrap-switch-button.min.js"></script>
    <title>Document</title>
    <link rel="stylesheet" href="./assets/style/admin_dashboard.css">

    


</head>
<body id="sid">
    <div class="dashboard">
      <div class="a1">
            <h2>Admin Dashboard </h2>
            <div class="mid_task">
                <h3>Welcome
                    <?=$name?>
                </h3>
                <div class="admin_profile" id="update">
                    <a href="update_profile.php"> <img src="assets/image/<?=$image_path ?>" alt="Admin Profile"></a>
                </div>
                <h3><a href="?logout">Log Out</a></h3>
            </div>
        </div>
    </div>