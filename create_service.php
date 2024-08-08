<?php
include("dashboard_header.php");
?>
<div class="inner_parent">
    <?php
        include("navigation.php");
?>
<div class="a3" id="service">
        <!-- insert service here -->
        <form action="" method="post"  id="imageUploadForm" class="insert_service">
            <h1>Insert Service</h1>
            <div> Service Name<input type="text" id="name" name="service_name"  /><br>
             Shot Description<textarea name="Shot" id="Shot" cols="30" rows="10" ></textarea></div>
           <div class="gallery-div">
             <p  class="gallery"> Serivce Image <input type="file" id="img" name="service_img"  /></p>
              <p  class="gallery">Gallery Images<input type="file" name="gallery[]" id="gallery1" multiple /></p>
           </div>
            <div>Prize <input type="number"  name="prize"  /><br>
            Brief Description <textarea name="detail" id="detail" cols="30" rows="10" required></textarea>
            <button type="submit" id="btn-service-insert">Submit</button>
            <p class="inserted-response"></p>

            </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script>
    // insert service
    $(document).ready(function () {
        $('#imageUploadForm').on('submit',(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: 'insert-service.php',
                data:formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    $(".inserted-response").html(response);
                    console.log(response);
                }
            })

        }));
    });
</script>