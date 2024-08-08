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
    .admin form input{
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
include("conn.php");
session_start();

if ($_SERVER['REQUEST_METHOD']=='POST') {
    $admin_email=$_POST['email'];
    $admin_pw=$_POST['password'];
    $sql = "SELECT password, name, role_id  FROM admin_dashboard where email=?";
   $stmt = $connect->prepare($sql);
   $stmt->bind_param("s", $admin_email);
   $stmt->execute();
   $res=$stmt->get_result();  
   if ($res->num_rows>0) {
    $data = $res->fetch_assoc();
    $hashpwd=$data['password'];
    $admin_name=$data['name'];
    $role_id = $data['role_id'];
echo $role_id;
   if (password_verify($admin_pw,  $hashpwd)) {
    $_SESSION['admin_name']=$admin_name;
    header("location:dashboard.php");
    $message= "Login successfully";

      
    //get permission
    $select_role="SELECT permission from user_role where role_id=? ";
    $stmt=$connect->prepare($select_role);
    $stmt->bind_param("i",$role_id);
    $stmt->execute();
    $results=$stmt->get_result();
    if ($results->num_rows >0) {
      $data=$results->fetch_assoc();
        $permissions = json_decode($data['permission'], true);
        $_SESSION['permissions'] = $permissions;
      print_r( $_SESSION['permissions']);

    }



   }else {
    $message= "Warning! wrong Password";
   }

   
   }else{
    $message= "Opps! 404 Invalid Details";

   }
   
}


?>
<div class="admin">
    <h1>Log In </h1>
     <form action="" method="post" id="admin">
            <label class="filled" for="name">Email</label>
            <input type="email" id="name" name="email" placeholder="Enter Your Email"
          >
           
            <label class="filled" for="pw">Password</label>
            <input type="password" id="pw" name="password" placeholder="........."
          >
            <span class="error"><?php ?></span>

            <button type="submit" id="btn_submit">Log In</button><br>
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