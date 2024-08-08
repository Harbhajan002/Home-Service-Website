
<style>
 .warning{
    width: 100%;
    height:100vh;
 } 
 .warning img{
    width: 100%;
    height:100%;
 }  
</style>
<?php
// session_start();
include("conn.php");
$permissions  = $_SESSION['permissions'];

  // path
  $the_array = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
  
  $a= chop($the_array[1],".php");

  $nav_id="SELECT * from navigation where nav_link= '$a'";
  $stmt=$connect->prepare($nav_id);
  $stmt->execute();
  $results=$stmt->get_result();
  if ($results->num_rows >0) {
    $data=$results->fetch_assoc();
    
    if (! in_array($data['nav_id'] ,$permissions )) {
    //  header("location:login.php");
    ?>
    <div class="warning">
    <img src="assets/image/oops.webp" alt="hi">

    </div>
    <?php
     exit();
    }else{


    }
}

?>