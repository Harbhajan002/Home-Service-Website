<?php
include("conn.php");
include("dashboard_header.php");
if (isset($_GET['id'])) {
  $serviceId= $_GET['id'];
  // update isactive status
   if ($_SERVER['REQUEST_METHOD']=='POST') {
   
   $service_name= $_POST['service_name'];
   $Shot_desc= $_POST['shot_desc'];
   $prize= $_POST['prize'];
   $detail= $_POST['detail'];

   // select db all gallery image
   $database=$connect->prepare('Select gallery from service where service_name=?');
        $database->bind_param('s',$service_name);
        $database->execute();
        $result=$database->get_result();
        $row=$result->fetch_assoc();
        $gallery_image_json=$row['gallery'];
        echo $gallery_image_json;
        $image_array = json_decode($gallery_image_json, true) ?? [];
      
// select gallery image for delete via checked input
   if (isset( $_POST['checkbox'])) {
   $galleryImage= $_POST['checkbox'];
   
      foreach ($galleryImage as $delete_image) {

         unlink($delete_image);
         print_r($delete_image);
         $key = array_search($delete_image, $image_array);
         unset($image_array[$key]);
        
      }
      $image_array = array_values($image_array);
        
     
   }
  
//   die();
   // main image
   if ( isset($_FILES['service_img'])) {
    // image name
        $img_name=$_FILES['service_img']['name'];
        // image folder name
        $img_folder=$_FILES['service_img']['tmp_name'];
        // image folder name with image name
        $img_path = "assets/image/".$img_name;
         move_uploaded_file($img_folder, $img_path);
      if ( move_uploaded_file($img_folder, $img_path)) {
        echo "inserted main image";
      }else{
         echo "not inserted";
      }

    }

   //  gallery images
   //  $image_array = array(); 
    if ( isset($_FILES['gallery'])) {
     foreach ($_FILES['gallery']['name'] as $key => $value) {
      $gallery_img_name=$_FILES['gallery']['name'][$key];
      $gallery_tmp_name = $_FILES['gallery']['tmp_name'][$key];
      $gallery_path = "assets/image/" . $gallery_img_name;

      move_uploaded_file($gallery_tmp_name, $gallery_path);
   //   $image_array[] = $gallery_path;
     $image_array[] = $gallery_img_name;
     }
     
  }
  echo "<pre>";
  print_r($image_array);
  echo "</pre>";
  $gallery_json = json_encode($image_array);

     $updateService="UPDATE service SET service_name= ?, service_image=?, service_description=?, gallery=?, prize=?, service_detail=? where service_id = ?";
  $stmt= $connect->prepare($updateService);
  $stmt->bind_param("ssssssi",$service_name, $img_path, $Shot_desc, $gallery_json, $prize, $detail , $serviceId);
 if ( $stmt->execute()) {
   echo "successfully edit";
  
 }else{
  echo "status not pass";
 }

}
?>

<div class="inner_parent">
<?php
        include("navigation.php");
        ?>
<div class="a3" id="service">
   <form action="" method="post"  id="imageUploadForm" class="insert_service" enctype="multipart/form-data">
            <h1>Edit Service</h1>
    <?php
       
            $sql ="SELECT * from service where service_id=  $serviceId "; 
            $result= $connect->query($sql);
            // $result=$stmt->get_result();
            if ($result->num_rows>0) {
                $data =$result->fetch_assoc();
               ?>          
            <div> Service Name<input type="text" id="name" name="service_name" value="<?= $data['service_name'];?>"  /><br>
             Shot Description<textarea name="shot_desc" id="Shot" cols="30" rows="10" ><?= $data['service_description'];?></textarea></div>
             <div class="gallery-div">

              <?php
               $images= json_decode($data['gallery']);
               
              foreach ($images as $i) {
                 ?>
              <input type="checkbox" name="checkbox[]"  value="<?=$i ?>">
             <img src="assets/image/<?= $i ?>" style="width:40px;height:40px;" alt="">
             <?php 
              } ?>
           </div>
           <div class="gallery-div">
             <p  class="gallery"> Serivce Image <input type="file" id="img" name="service_img"/></p>
              <p  class="gallery">Gallery Images<input type="file" name="gallery[]" id="gallery1" multiple /></p>
           </div>
            <div>Prize <input type="number"  name="prize" value="<?= $data['prize']?>"  /><br>
            Brief Description <textarea name="detail" id="detail" cols="30" rows="10"  required><?= $data['service_detail'];
                 ?>"</textarea>
            <button type="submit" id="btn-service-insert">Submit</button>
            <p class="inserted-response"></p>

            </div>
</div>
<?php
}

  }
  ?>
