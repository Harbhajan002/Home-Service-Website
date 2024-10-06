<style>
td img{
    width:100%;
    height: 150px;
}
</style>
<?php
include("dashboard_header.php");
include("navigation.php");

?>

   <div class="a3" id="service">
<?php
        include("conn.php");
        //  select service table
            $select_service_detail = "SELECT * FROM service ";
            $stmt = $connect->prepare($select_service_detail);
            $stmt->execute();
            $res=$stmt->get_result();  
            if ($res->num_rows>0) {
            $row=$res->num_rows;
            ?>
   
           
        </form>
        <div class="inserted-response"></div>
        <!-- display service  -->
        <p>Total Number of Booking :
            <?=$row?>
        </p>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th class="image">Service Image</th>
                    <th>ActiveStatus</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                             while($data = $res->fetch_assoc()){
                               $isactive=$data['isactive'];
                            ?>
                <tr>
                    <td>
                        <?=$data['service_id'] ?>
                    </td>
                    <td>
                        <?=$data['service_name'] ?>
                    </td>
                    <td>
                        <?=$data['service_description'] ?>
                    </td>
                    <td>
                        <img src="<?=$data['service_image'] ?>" alt="">
                    </td>
                    <td>
                    <label class="switch">

                        <?php
                              if ($isactive === 1) { ?>
                                    <input type="checkbox" class="changestatus" attr-service-id="<?=$data['service_id'] ?>" checked>
                            
                           <?php  }else{ ?>
                            <input type="checkbox" class="changestatus" 
                            attr-service-id="<?=$data['service_id'] ?>">

                          <?php }

                        ?>
                    <span class="slider round"></span>
                   
                    </td>
                    <td >
                        <a href="edit_service.php?id=<?=$data['service_id']?>">Edit</a>
                    </td>
                </tr>
                <?php
    }
   }else{
    $message= "Opps! 404 Invalid Details";
   }
   
    ?>
            </tbody>
        </table>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script>
 $(document).ready(function () {
    $('#service_list').addClass('active_nav'); 
   
    $(".changestatus").change(function () {
        let service_id=$(this).attr('attr-service-id');
        console.log("service_id",service_id);
        $.ajax({
            type:'POST',
            url:'activate_service.php',
            data:{
                serviceId:service_id,
            },
            success: function (res) {
                console.log(res);
            }
           
        })

    });
  
 })

//  function changeStatus(el,id){
// console.log(id);
//  }
</script>