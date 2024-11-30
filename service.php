
<?php include("header.php");?>
<nav class="nav-slider">
        <div class="aboutslider">
            <img src="./assets/image/banner.jpg" class="about-image" alt="">
            <div class="abouttext">
                <h2 class="slog"><span>Services</span></h2>
            </div>
        </div>
    </nav>
    <div id="serviceparent">
   
       
        <!-- service card start-->
        <div id='servicecard'>
        <?php
        include("conn.php");

         $servicecard="SELECT * from service where isactive = true ";
         $res=$connect->prepare($servicecard);
         $res->execute();
          $stmt=$res->get_result();                
         if ($stmt->num_rows > 0) {
          while($data =$stmt->fetch_assoc()){
          $service_id =$data['service_id'];
          $service_name =$data['service_name'];
          $image =$data['service_image'];
          $s_description =$data['service_description'];
          ?>
          <div class='card' data-service-id='<?=$service_id ?>'>
          <h3 class='card-title'><?=$service_name?></h3>

           <img src='<?= $image ?>' class='card-img-top'>
              
          </div>
     <?php
          }
         }?>
       
       </div> 
        </div>
   <!--  -->
   <?php include("footer.php") ?>
    
<!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="./assets/external/script.js"></script> -->
<script>
    $(document).ready(function () {
        $('#service').addClass('active'); 
    
    });
</script>