
<?php include("header.php");?>
    <div class="nav-slider">
        <div class="aboutslider">
            <img src="./assets/image/about-2.jpg" class="about-image" alt="">
            <div class="abouttext">
                <h2 class="slog"><span>About Us</span></h2>
            </div>
        </div>
    </div>

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

        <!-- faqs section -->
         <div class="faqs">
            <h2>Frequently Asked Questions</h2>
            <div class="inner-details">
                <div class="accordian">
                    <h4>How long does carpet take to dry? <span ><i class="icon-faq fa-solid fa-caret-down"></i></span></h4> <hr>
                    <p  class="faq-info"   >It depends on the type of Carpet. Big, open of areas of carpet can easily be dry within 30 minutes using our low moisture system but smaller areas will take longer. If ‘steam’ cleaning is used, drying times are extended and will take up to 24 hours to dry fully.</p>
                </div>

                <div class="accordian">
                    <h4>How safe are your cleaning chemicals? <span ><i class="icon-faq fa-solid fa-caret-down"></i></span></h4> <hr>
                    <p  class="faq-info"   >All general cleaning chemicals used by Safaiwale conform to the highest standards of safety and are chosen for their suitability in your home where children or pets are present and not on cost. Unlike ‘one man band’ operations, we also have to consider the safety and welfare of our staff because 
                        of their continual exposure to the products we use.</p>
                </div>

                <div class="accordian">
                    <h4>Do you guarantee you work? <span ><i class="icon-faq fa-solid fa-caret-down"></i></span></h4> <hr>
                    <p  class="faq-info"   >Yes. Every job carried out by Safaiwale, 100% money back guarantee.</p>
                </div>

                <div class="accordian">
                    <h4>What kind of system do you use? <span ><i class="icon-faq fa-solid fa-caret-down"></i></span></h4> <hr>
                    <p  class="faq-info"   >Our company uses both hot water extraction ‘steam cleaning’ and low moisture cleaning. (Much more information is available in our consumer guide.) Despite many misleading claims, no single system is suitable for all carpets and we will always pick the system that will achieve the best result for you. Our advice to consumers is never to get 
                        ‘hung up’ on the system. The operator is far more important and you’re covered by our money back guarantee.</p>
                </div>

                <div class="accordian">
                    <h4>Are you insured?<span ><i class="icon-faq fa-solid fa-caret-down"></i></span></h4> <hr>
                    <p  class="faq-info">Yes we are insured. All businesses are required by law to carry public liability insurance. This means if you trip over a cable and break your neck, you’ll
                         be covered. We go a step further and are covered for ‘goods worked on’. This is expensive and few cleaning companies have this. For us and our client’s peace of mind, we are covered for damage to your possessions.</p>
                </div>
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
<script>
  const accordions = document.querySelectorAll('.accordian');
  
  accordions.forEach((accordion) => {
    accordion.addEventListener("click", () => {
      const faqInfo = accordion.querySelector('.faq-info');
      const iconFaq = accordion.querySelector('.icon-faq');

      if (faqInfo) {
        // Toggle the class on the specific paragraph
        faqInfo.classList.toggle('active-faqs');
        iconFaq.classList.toggle('arrow');
      }
    });
  });
</script>


