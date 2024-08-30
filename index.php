
<?php include("header.php");?>

<div class="slider">
    <video autoplay muted playsinline loop src="https://wedesignthemes.s3.amazonaws.com/mezan/Mezan+VD+Work+5mb.mp4"
    style="width: 1351.11px; height: 760px;"></video>
    <div class="textarea">
      <p>Let’s get to work</p>

       <h2 class="slog"><span>HomeEase</span> to the highest standards.</h2>
    </div>

</div>


    <nav id="nav">
        <div class="slider">
            <img src="./assets/image/slider.png" alt="">
            <div class="textarea">
                <h2 class="slog"><span>HomeEase</span> to the highest standards.</h2>
            </div>
        </div>
    </nav>

    <div id="servicecontent">
        <div class="servicecontent">
            <h2>Our  Services</h2>
        </div>
        <!-- service card start-->
        <div id='servicecard'>
        <?php
        include("conn.php");

         $servicecard="SELECT * from service where isactive = true  limit 4";
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
           <img src='<?= $image ?>' class='card-img-top'>
              <div class='card-body'>
                  <h3 class='card-title'><?=$service_name?></h3>
                  <p class='card-text'><?=$s_description?>.</p>
              </div>
          </div>
     <?php
          }
         }?>
       
       </div> 
        <!-- service card end -->
    </div>
   <?php include("footer.php"); ?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="./assets/external/script.js"></script>
<script>
    $(document).ready(function () {
        $('#home').addClass('active'); 
    });
</script>
