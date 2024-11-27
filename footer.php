
    <!-- footer -->
    <footer>
     <div class="detial">
        <img class="footer-image" src="./assets/image/footer-image.png" alt="footer-image">
            <div class="column-section col-1">
                    <h2><a href="index.php">
                    <img src="./assets/image/hhh.png" alt="servicelogo">
                     </a></h2>
                    <p class="footer-description">
                    At HomeEase, we offer a wide range of home services, including cleaning, 
                    plumbing, electrical shifting, and security, across 32+ cities in India. Our 
                    team of 1,000+ trained professionals is ready to handle all your needs with expertise. 
                    We focus on delivering convenient, reliable, and top-quality services right to your
                     doorstep. Customer satisfaction is our top priority, and we strive to exceed expectations. 
                    Choose HomeEase for exceptional service and the best value for your home.</p>
                
            </div>
            <div class="column-section ">
                <h2>Our Services</h2>
                <?php
                $service_name = "Select * from service ";
                $results = $connect->prepare($service_name);
                $results->execute();
                $stmt= $results->get_result();
                if ($stmt->num_rows >0) {
                   while($data = $stmt->fetch_assoc()){
                    $services = $data['service_name']; 
                    $service_id =$data['service_id'];
                    ?>
                    <p class="service-desc" data-service-id='<?=$service_id ?>'> >&nbsp  <?= $services ?></p>
                    <?php
                   }
                }
                ?>
                
            </div>
            <div class="column-section">
                <h2>Quick Links</h2>
                <p> <a href="">>&nbsp About Us</a></p>
                <p><a href=" ">>&nbsp Privacy Policy</a></p>
                <p> <a href="">>&nbsp Contact</a></p>
                <p><a href=""> >&nbsp FAQ's</a></p>
                <p> <a href="">>&nbsp Terms & Condition</a></p>
            </div>
            <div class="column-section">
                <h2>Contact</h2>
                <p>123-45-450-450</p>
                <p>23 Bardeshi, Savarr Dhaka 1348</p>
                <p>Insta: @homeease1002</p>
                <div class="newslatter">
                    <input type="email" id="newsEmail" placeholder="Email Id" >
                    <button type="submit" id='subscribe'>Subscribe</button>
                </div>
                <div class="credit">
                    <h2>We Accept</h2>
                    <img src="./assets/image/credit.png" alt="">
                </div>
            </div>
        <img class="footer-image2" src="./assets/image/footer-image.png" alt="footer-image">

    </div>
        <hr>
        <p class="copy"> Copyright ©2020 HomeEase. All Rights Reserved</p>
    </footer>
    <script>
    window.addEventListener("scroll", function () {
        var header= document.querySelector(".head");
        console.log("header"+header);
        
        header.classList.toggle("sticky", window.scrollY > 40 );
    });

    </script>
  
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="./assets/external/script.js"></script>

  <script>
    $(document).ready(function (){
        $('#subscribe').click( function(){
          var newsEmail=   $("#newsEmail").val();
        console.log(newsEmail);
        if (newsEmail === "") {
              return;  // Stop the AJAX request from being sent
          }

        $.ajax({
                type: 'POST',
                url: 'news_letter.php',
                data: { newsEmail: newsEmail }, 
                success: function (response) {
                    $(".newslatter").html(response);
                    console.log("response"+response);
                }
            })
        })
    })
  </script>
</body>
</html>