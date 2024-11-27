// home.php

    $(document).ready(function () {     
     // Load the service form when #data-service-id is clicked
     $(document).on('click', '[data-service-id]', function () {
      console.log("onlilcik");
      
            var serviceId = $(this).data('service-id');
            console.log("working",serviceId);
            
                  $.ajax({
                    type:'POST',
                    url:'descrption.php',
                 
                    success: function() {
                        window.location='descrption.php?service_id='+serviceId;
                    }
                  });
        });

//contact.php
    // frontend validation
    $('#contact_user').validate({
      rules:{
        uname:"required",
          mail:"required",
          phone:{
              required:true,
              minlength:10
          }
      }
    
  });
});

