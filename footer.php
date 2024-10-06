
    <!-- footer -->
    <footer>
    <div class="end">
        <div class="detial">
        <div class="c1">
                <h2 id="home"><a href="index.php">
                <img src="./assets/image/hhh.png" alt="servicelogo">
           </a></h2>
                <p>From repairs to renovations, cleaning to landscaping, 
                we're here to make your home a haven.</p>
                
            </div>
            <div class="c2">
            <h2 id="home">Address</h2>
                <p>23 Bardeshi, Savarr Dhaka 1348</p>
                <p>hello@homeease.com</p>
                <p>01234 567 890</p>
                
            </div>
            <div class="c3">
            <h2 id="contact">Contact</h2>
                <p>123-45-450-450</p>
                <p>homeease@yahoo.in</p>
                <p>Insta: @homeease1002</p>
            </div>
        </div>
        <hr>
        <p class="copy"> Copyright ©2020 Clenify. All Rights Reserved</p>
        </div>
    </footer>
    <script>
    window.addEventListener("scroll", function () {
        var header= document.querySelector(".head");
        console.log("header"+header);
        
        header.classList.toggle("sticky", window.scrollY > 40 );
    });

    </script>
  
    </body>

</html>