<?php
 include("conn.php");

 if ($_SERVER['REQUEST_METHOD']=='POST') {
    $service_name=$_POST['service_name'];
    $Shot_desc=$_POST['Shot'];
    $detail=$_POST['detail'];
    $prize=$_POST['prize'];

    if ( isset($_FILES['service_img'])) {
    // image name
        $img_name=$_FILES['service_img']['name'];
        // image folder name
        $img_folder=$_FILES['service_img']['tmp_name'];
        // image folder name with image name
        $img_path = "assets/image/".$img_name;

        if ( move_uploaded_file($img_folder, $img_path)) {
            echo "Upload Main File Successfully<br>";
        } else {
           echo "File Not Upload to Server<br>";
        }
    }
    
    $gallery_paths = array(); 
    if ( isset($_FILES['gallery'])) {
     foreach ($_FILES['gallery']['name'] as $key => $value) {
      $gallery_img_name=$_FILES['gallery']['name'][$key];
      $gallery_tmp_name = $_FILES['gallery']['tmp_name'][$key];
      $gallery_path = "assets/image/" . $gallery_img_name;

      if ( move_uploaded_file($gallery_tmp_name, $gallery_path)) {
        echo "Upload gallery Successfully<br>";
       

    } else {
       echo "File Not Upload to Server";
    }
    //  $gallery_paths[] = $gallery_path;
     $gallery_paths[] = $gallery_img_name;
     }
     
  }
   // Convert gallery_paths array to JSON
   $gallery_json = json_encode($gallery_paths);
   echo $gallery_json;
//    die();
     //    insert into db
   $service_info="insert into service (service_name, service_image, service_description, gallery, prize, service_detail )
   values(?,?,?,?,?,?)";
   $stmt=$connect->prepare($service_info);
   $stmt->bind_param("ssssss", $service_name, $img_path, $Shot_desc, $gallery_json, $prize, $detail );
   if (  $stmt->execute()) {
       echo "inserted data into database Successfully";
   }else{
       echo "Not inserted data into database";
   }

   

 }
?>