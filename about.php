
<?php include("header.php");?>
    <nav id="nav">
        <div class="aboutslider">
            <img src="./assets/image/about.jpg" class="about-image" alt="">
            <div class="abouttext">
                <h2 class="slog"><span>About Us</span></h2>
            </div>
        </div>
    </nav>

    <div class="detail">
     <h2>  Our Values</h2>
        <div class="info-img">
        <img src="./assets/image/about-mission.jpg" alt="">

        <div class="info">
          <p><span>Quality:</span> We are committed to delivering the highest quality services with attention to detail.</p>
          <p><span>Reliability:</span> Customers can count on us to be punctual, professional, and dependable.</p>
          <p><span>Integrity:</span> We conduct our business with honesty, transparency, and ethical standards.</p>
          <p><span>Customer Satisfaction:</span> Your satisfaction is our priority. We strive to ensure every customer is delighted with our services.</p>
           <p><span>Innovation: </span> We continuously explore innovative solutions and stay updated with the latest trends and technologies in the industry.</p>
        </div>
        </div>

    </div>
    <?php include("footer.php") ?>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#about').addClass('active'); 
    });
</script>