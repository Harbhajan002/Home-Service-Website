<style>
    body {
            font-family: Arial, Helvetica, sans-serif;

        }

    .admin{
        display:flex;
        justify-content: center;
        flex-direction:column;
        align-items:center;
    }
    .admin form{
        display:flex;
        flex-direction:column;
        width: 25%;
        border:1px solid;
        padding:40px;
        border-radius:5px;
    }
    .admin form .a{
        height: 35px;
    margin-bottom: 5px ;
    border: 1px solid;
    border-radius: 10px;
    }
    .admin form .filled{
        margin-top: 25px;

    }
    .admin form button{
        height: 35px;
    margin-top: 25px ;
    border: 1px solid;
    border-radius: 10px;
    font-size: 20px;
    width: 30%;
    background: #544373;
    cursor: pointer;
    color: white;
    }
    a{
        text-decoration:none;
        color: #fff;
    }
    .msg{
        color:red;
    }
    .error{
        color:red;
    }
</style>
<?php
include("dashboard_header.php");
include("navigation.php");

include("conn.php");
if (isset($_SESSION['admin_name'])) {
    $get_name=$_SESSION['admin_name'];

   
   $update_query = "SELECT name, email, image_path FROM admin_dashboard where name=?";
   $stmt = $connect->prepare($update_query);
   $stmt->bind_param("s", $get_name );
   $stmt->execute();
   $res=$stmt->get_result();  
   if ($res->num_rows>0) {
    $data = $res->fetch_assoc();
    $updatename=$data['name'];
    $updateemail=$data['email'];
    $image_path=$data['image_path'];
   echo $image_path;
    // edit data'
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $edit_name = $_POST['name'];
        $edit_email = $_POST['email'];

       if (isset($_FILES['images'])) {
           $image_name=$_FILES['images']['name'];
           $image_folder=$_FILES['images']['tmp_name'];
           print_r($_FILES);
           if (move_uploaded_file($image_folder, "assets/image/".$image_name)) {
            echo "Upload File Successfully<br>";
            }else{
                echo "not uploades";
            }
            //delete image
            echo "<br>";
            unlink("assets/image/".$image_path);
            
           // insert image
            $edit = "UPDATE admin_dashboard SET name=?,  email=?,  image_path=? WHERE name=?";
            $stmt = $connect->prepare($edit);
            $stmt->bind_param("ssss", $edit_name, $edit_email, $image_name,  $get_name);
            
            if ($stmt->execute()) {
            $_SESSION['edit_name']=$edit_name;

              header("location:login.php");
                
                $message = "Update successful";
    
            } else {
                $message = "Oops! 404 Invalid Details";
            }

       }else{
        echo '<br> hi';
       }
      
   
   }
}
}
?>
<div class="admin">
    <h1>Update</h1>
     <form action="" method="post" id="admin" enctype="multipart/form-data">
            <label class="filled" for="name">Name</label>
            <input type="text" id="name" class="a" name="name" placeholder="Enter Your Name"
            value="<?php echo isset($updatename) ? $updatename : ''; ?>">
           
            <label class="filled" for="mail">E-mail</label>
            <input type="email" class="a" id="mail" name="email"
            value="<?php echo isset($updatename) ? $updateemail : ''; ?>">

          

            <label class="filled" for="img">Image</label>
            <input type="file"  id="img" name="images">

            <button type="submit" id="btn_submit">Update</button><br>
            <span class="msg"><?php echo isset( $message) ?$message: "";  ?></span>

     </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script>
     $("#admin").validate({
        rules:{
            name:"required",
            password:{
                required:true,
                minlength:8
            }
        }
     })
</script>