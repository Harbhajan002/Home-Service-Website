<style>
.role_ids{
    width:auto;
}
</style>
<?php
include("dashboard_header.php");

if ($_SERVER['REQUEST_METHOD']=='POST') {
    $admin_name=$_POST['name'];
    $admin_email=$_POST['email'];
    $admin_pw=$_POST['password'];
    $role_id=$_POST['role_id'];

    // $_FILE['imaage'] return array have [name, size, tmp_name, type]
    if (isset($_FILES['image'])) {
        $file_name=$_FILES['image']['name'];
        $file_tmp=$_FILES['image']['tmp_name'];
        if ( move_uploaded_file($file_tmp, "assets/image/".$file_name)) {
            $message= "Upload File Successfully";
        } else {
            $message= "File Not Upload to Server";
        }
        
    $hashed_password = password_hash($admin_pw, PASSWORD_DEFAULT);
    $sql = "INSERT INTO admin_dashboard (name , password , email, image_path, role_id )
    VALUES (?, ?, ?, ?, ?)";
   $stmt = $connect->prepare($sql);
   $stmt->bind_param("sssss", $admin_name, $hashed_password  ,$admin_email, $file_name, $role_id);
   
   if ($stmt->execute()) {
    $message= "Registration successfully";
     }else{
      $message= "Opps! 404 Invalid Details";
     }
    }
   
}
include("navigation.php");


?>

<div class="admin">
<h2>Sign Up</h2>

     <form action="" method="post" id="admin" enctype="multipart/form-data">
            <select name="role_id"  class="a">
                <option value="role">Select Role</option>
             <?php
               $select_role="SELECT * from user_role";
               $stmt=$connect->prepare($select_role);
               $stmt->execute();
               $results=$stmt->get_result();
               if ($results->num_rows >0) {
                 while ($data=$results->fetch_assoc()) {
                  ?>
                  <option value="<?=$data['role_id']?>"><?=$data['role_name']?></option>
             <?php
                 }
               }
             ?>
            </select>
            <label class="filled" for="name">Name</label>
            <input type="text" class="a" id="name" name="name" >
            <span class="error"><?php  ?></span>
            
            <label class="filled" for="mail">E-mail</label>
            <input type="email" class="a" id="mail" name="email" >
            <span class="error"><?php  ?></span>

            <label class="filled" for="pw">Password</label>
            <input type="password" class="a" id="pw" name="password" >
            <span class="error"><?php  ?></span>
            
            <label class="filled" for="img">Image</label>
            <input type="file" id="img"  name="image" required />
            <span class="error"><?php  ?></span>
            <div class="sign-button">  <button type="submit" id="btn_submit">Sign Up</button>
            <button type="submit" id="btn_submit"><a href="login.php">Log In</a></button></div>
           
            <span class="msg"><?php if (isset($message)) {
               echo $message;
            }  ?></span>

     </form>
</div>
        </div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script>

$(document).ready(function () {
    $('#signup').addClass('active_nav'); 
     $("#admin").validate({
        rules:{
            name:"required",
            email:"required",
            password:{
                required:true,
                minlength:8
            }
        }
     });
    });
</script>