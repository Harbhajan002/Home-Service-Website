
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
  


  <!-- etst case -->
  <script>
        particlesJS("particles-js", {
            particles: {
                number: {
                    value: 100,
                    density: {
                        enable: true,
                        value_area: 800
                    }
                },
                color: {
                    value: "#ffffff"
                },
                shape: {
                    type: "circle",
                    stroke: {
                        width: 0,
                        color: "#000000"
                    },
                    polygon: {
                        nb_sides: 5
                    },
                    image: {
                        src: "img/github.svg",
                        width: 100,
                        height: 100
                    }
                },
                opacity: {
                    value: 0.5,
                    random: false,
                    anim: {
                        enable: false,
                        speed: 1,
                        opacity_min: 0.1,
                        sync: false
                    }
                },
                size: {
                    value: 5,
                    random: true,
                    anim: {
                        enable: false,
                        speed: 40,
                        size_min: 0.1,
                        sync: false
                    }
                },
                line_linked: {
                    enable: true,
                    distance: 150,
                    color: "#ffffff",
                    opacity: 0.4,
                    width: 1
                },
                move: {
                    enable: true,
                    speed: 6,
                    direction: "none",
                    random: false,
                    straight: false,
                    out_mode: "out",
                    attract: {
                        enable: false,
                        rotateX: 600,
                        rotateY: 1200
                    }
                }
            },
            interactivity: {
                detect_on: "canvas",
                events: {
                    onhover: {
                        enable: true,
                        mode: "repulse"
                    },
                    onclick: {
                        enable: true,
                        mode: "push"
                    },
                    resize: true
                },
                modes: {
                    grab: {
                        distance: 400,
                        line_linked: {
                            opacity: 1
                        }
                    },
                    bubble: {
                        distance: 400,
                        size: 40,
                        duration: 2,
                        opacity: 8,
                        speed: 3
                    },
                    repulse: {
                        distance: 200,
                        duration: 0.4
                    },
                    push: {
                        particles_nb: 4
                    },
                    remove: {
                        particles_nb: 2
                    }
                }
            },
            retina_detect: true
        });
    </script>
    </body>

</html>