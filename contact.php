<?php include("header.php");
 $nameErr="";
 $emailErr="";
 $passwdErr="";
 ?>
    <div class="contactsection">
    <nav class="nav-slider">
        <div class="aboutslider">
            <img src="./assets/image/banner.jpg" class="about-image" alt="">
            <div class="abouttext">
                <h2 class="slog"><span>Contact Us</span></h2>
            </div>
        </div>
    </nav>
<div class="signup">
<div class="centre">

    <h2>Registration</h2>

        <form action="" method="post" id="contact_user">
            <!-- select service -->
                <select name="service" id="service_id">
                  <option value="">Select option</option>
                  <?php
                        
                    include("conn.php");
                    // if (isset($_GET['serviceId'])) {
                       $ser_id=  $_GET['serviceId'];
                     
                          $sql ="SELECT * from service ";
                          $stmt=$connect->prepare($sql);
                        //   $stmt->bind_param("i",$ser_id);
                          $stmt->execute();
                           $res=$stmt->get_result();  
                          if ($res->num_rows>0) {
                             while ( $data = $res->fetch_assoc()){
                              $id=$data['service_id'];
                              $name=$data['service_name']; 
                              $selected = ($ser_id == md5($id)) ? "selected" : "";
                              ?>
                              <option value="<?=$id?>" <?=$selected ?>  >
                              <?= $name ?></option>
                              <?php
                             };
                            }
                                               
                    ?>
                </select><br>
            <!-- contact detail -->

            <input type="text" id="username" name="uname" required placeholder="Name">
            <span class="error"><?php echo $nameErr; ?></span>
            
            <input type="email" id="mail" name="mail" placeholder="E-mail" >

            <input type="text" id="number" name="phone" placeholder="Number"  >

            <textarea name="message" id="message" cols="10" rows="10" placeholder="Message" ></textarea>
            <br>
            <p id="customer_res"></p>
            <button type="button" id="btn_submit">Get In Touch</button><br>
        </form>

    </div>
    <div class="centre">
        <img src="./assets/image/service-1.jpg" alt="">
    </div>
</div>
<div class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d31143512.123425674!2d20.7628834030081!3d17.664444714034705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1shomeease%20service%20!5e0!3m2!1sen!2sin!4v1711966439755!5m2!1sen!2sin"
            width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>

<?php include("footer.php") ?>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>



<script>
    $(document).ready(function () {
 

        $('#contact').addClass('active'); 
        $("#btn_submit").click(function () {
                var service_id = $('#service_id').val();
                var username = $('#username').val();
                var mail = $('#mail').val();
                var number = $('#number').val();
                var message = $('#message').val();
                console.log(service_id, username);
              
                $.ajax({
                    type: 'POST',
                    url: 'customer_insert.php',
                    data: {
                      mail: mail,
                      number: number,
                      service_id: service_id,
                      username: username,
                      message: message,
                    },
                    success: function (response) {
                        console.log("response",response);
                        if (response == username ) {
                          if ( window.history.replaceState ) {
                                  Swal.fire({
                                title: "Successfully Booked Service",
                                text: username,
                                icon: "success"
                              });
                            window.history.replaceState( null, null, window.location.href );
                          }
                        } else {
                          Swal.fire({
                          icon: "error",
                          title: "Oops...",
                          text: response + "   is required",
                          footer: 'Why do I have this issue?'
                        });
                        }
                       
                    }
                  
                })
            });
                 $('#contact_user').validate({
      rules:{
        uname:{
          required:true
        },
          mail:{
            required:true
          },
          phone:{
              required:true,
              minlength:10
          }
      }
    
  });
    });
</script>


<!-- <script src="./assets/external/script.js"></script> -->