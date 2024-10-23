
<?php include("header.php");?>

<div class="slider">
    <video autoplay muted playsinline loop src="https://wedesignthemes.s3.amazonaws.com/mezan/Mezan+VD+Work+5mb.mp4"
    style="width: 100%;  "></video>
    <div class="textarea">
      <p>Let’s get to work</p>

       <h2 class="slog"><span>HomeEase</span> to the highest standards.</h2>
    </div>

</div>
<div class="demo-amination">
<canvas class="particles-js-canvas-el" width="1908" height="543" style="width: 100%; height: 100%;"></canvas>
</div>


   <!--new section  -->
   <div class="choose">
   <span><i class="fa fa-thin fa-t fa-rotate-90"></i>
   <h2 class="who-we">Why Choose Us</h2><i class="fa fa-thin fa-t fa-rotate-270"></i></span>
    <p>Lorem ipsum dolors architecto animi nemo iusto, quaerat aliquam velit fugiat rem.    </p>

    <div class="choose-category">
        <div class="image-section">
            <img src="./assets/image/who_we_img.png" alt="choose">
            <h2 >who we are</h2>
            <p>Proin gravida nibh vel velit auctor aliquet. ean sollicitudin, lorem quis bibendu ipsum, nec sagittis sem nibh Duis sed odio sit.

Proin gravida nibh vel velit auctor aliquet. ean solly, Duis sed sollicitudin odio sitnibh</p>
           <div class="btn-section">
           <button>Get a Quote</button>
           </div>
           
        </div>
        <div class="feature-section">
            <div class="row">
          <div class="feature">
          <i class="fa fa-sharp fa-thin fa-bug"></i><br>

            <h2>Earliest Consultation</h2>
            <p>We prioritize your time by offering prompt consultations. Our team is dedicated to understanding 
                your needs and providing expert advice at the earliest convenience.
             </p>
          </div>
          <div class="feature">
          <i class="fa fa-sharp fa-thin fa-bug"></i><br>
          
            <h2>Customized Solution</h2>
            <p>Every home is unique. We tailor our services to meet your specific requirements, 
                ensuring that you receive the best solutions designed just for you.
             </p>
          </div>
          </div>
     <div class="row">

          <div class="feature">
          <i class="fa-duotone fa-solid fa-id-card"></i><br>
            <h2>Affordable Pricing</h2>
            <p>Quality services shouldn’t break the bank. We offer competitive pricing options to 
                ensure you get exceptional value without compromising on quality.
             </p>
          </div>

          <div class="feature">
          <i class="fa fa-solid fa-leaf"></i><br>
            <h2>All-In-One Service</h2>
            <p> From start to finish, we handle everything. Our comprehensive services make it easy 
                for you to manage your home needs with a single reliable provider.
             </p>
          </div>
</div >

        </div>
    </div>
   </div>


    <div id="servicecontent">
        <div class="servicecontent">
        <span><i class="fa fa-thin fa-t fa-rotate-90"></i>
        <h2 class="who-we">Our Services</h2><i class="fa fa-thin fa-t fa-rotate-270"></i></span>
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
