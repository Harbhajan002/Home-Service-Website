<div class="inner_parent">
    <div class="a2">
<input type="text" name="search" id="search" placeholder="Search here...">
<?php
   if (isset($_SESSION['admin_name'])) {
    $admin_name= $_SESSION['admin_name'];
     $select_role="SELECT role_id from admin_dashboard where name= ?";
    $stmt=$connect->prepare($select_role);
    $stmt->bind_param("s",$admin_name);
    $stmt->execute();
    $results=$stmt->get_result();
    if ($results->num_rows >0) {
      $data=$results->fetch_assoc();
        $role_id = $data['role_id'];
      }
    
    $select_role="SELECT permission from user_role where role_id=? ";
    $stmt=$connect->prepare($select_role);
    $stmt->bind_param("i",$role_id);
    $stmt->execute();
    $results=$stmt->get_result();
    if ($results->num_rows >0) {
      $data=$results->fetch_assoc();
        $permissions = json_decode($data['permission'], true);
        // print_r($_SESSION['permissions'] );
        echo "<br>";
  
        // array of permission saprate into single value
        foreach ($permissions as $permission) {
         
            $select_navigation="SELECT * from navigation where nav_id= $permission";
            $stmt=$connect->prepare($select_navigation);
            $stmt->execute();
            $results=$stmt->get_result();
            if ($results->num_rows >0) {
              while ($data=$results->fetch_assoc()) {
               ?>
         <!-- live search input -->
           <h3 ><a id="<?=$data['nav_link']?>" href="<?=$data['nav_link']?>.php"><?=$data['nav_name']?></a></h3>
          
            <?php
              }
            }
        }
     
      // echo $_SERVER['QUERY_STRING']; use for access get parameter
         }
   }
   ?>

    </div>
    <!-- </div> -->
