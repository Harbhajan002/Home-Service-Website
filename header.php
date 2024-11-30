<?php
include("conn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/style/desgin.css">
    <link rel="stylesheet" href="./assets/style/homease.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>Homeease</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"></script>

</head>

<body>
<header id="#top">
      <div class="nav">
       
        <div class="address">
          <p><i class="fa-solid fa-location-dot"></i>376 Branson Oval Suite 200, Mexico</p>
          <p><i class="fa-sharp fa-solid fa-envelope"></i>homeease@gmail.com</p>
        </div>
        <div class="social_icon">
        <i class="fa-brands fa-facebook" ></i>
        <i class="fa-brands fa-twitter" ></i>
        <i class="fa-brands fa-youtube" ></i>
        <i class="fa-brands fa-instagram" ></i>
        </div>

      </div>
        <div class="head">
            <div class="logo">
            <a href="index.php">
                <img src="./assets/image/hhh.png" alt="servicelogo">
           </a>
            </div>
            <div class="page">
                <a href="index.php">
                <h2 id="home">Home</h2>
                </a>
                <a href="about.php">
                  <h2 id="about">About Us</h2>
                </a>
                <a href="service.php">
                  <h2 id="service">Service</h2>
                </a>
               
                <a href="contact.php">
                <h2 id="contact">Contact Us</h2>
                </a>
                  
                <!-- <a href="signup.php"><h2>login2 </h2></a> -->
            </div>
            <div class="hamburger" id="hamburger">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
        </div>
        <div class="side-menu open" id="side_menu">
<ul>
<a href="index.php">
<li id="home">Home</li>
</a>
<a href="about.php">
<li id="about">About Us</li>
</a>
<a href="service.php">
<li id="service">Service</li>
</a>

<a href="contact.php">
<li id="contact">Contact Us</li>
</a>

</ul>

</div>
    </header>
