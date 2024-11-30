
  <?php include("header.php");?>
  <div class="serviceparent">
    <div class="img">
      <?php
     include("conn.php");

       if (isset($_GET['service_id'])) {
         $serviceId=$_GET['service_id'];
 

         $servicecard="SELECT * from service where service_id=? ";
         $res=$connect->prepare($servicecard);
         $res->bind_param("i",$serviceId);
         $res->execute();
          $stmt=$res->get_result();                
         if ($stmt->num_rows > 0) {
          $data =$stmt->fetch_assoc();
          $sid =$data['service_id'];
          $service_name =$data['service_name'];
          $image =$data['service_image'];
          $service_desc =$data['service_description'];
          $gallery =$data['gallery'];
          $prize =$data['prize'];
          $service_detail =$data['service_detail'];
        ?>
          <div class='image' data-service-id='<?=$service_id ?>'>
              <img src='<?=$image ?>' class='card-img-top'>
              <div class='card-body'>
                  <h3 class='card-title'><?=$service_name ?></h3>
              </div>
          </div>
    </div>
    <div class="desc">
      <p><?= $service_desc ?></p>
      <p><?= $service_detail ?></p>
      <button type="submit"class="btn-info" ><a href='contact.php? serviceId=<?=md5($sid)?>'> Get A Quote</a></button>
    </div>
  </div>
  <div class="gallery">
    <h2> Our Gallery</h2>
      <div class="gallery-img">
        <?php
        $gallery_array=json_decode($gallery);
        foreach ($gallery_array as $single_image) {
          ?>
          <img src="assets/image/<?= $single_image ;?>" alt="">
           <?php
        }
          ?>
    </div>
  </div>
  <?php 
          }
          
        }else{
          echo "Not selected any service";
        }
?>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- <script src="overall.js"></script> -->
<script>
  $(document).ready(function () {
    $('#service').addClass('active');


    //    // Load the contact form when #contact is clicked

  });
</script>
<?php include("footer.php") ?>
