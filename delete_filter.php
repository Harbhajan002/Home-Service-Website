<?php 
 include("conn.php");
   // soft delete data
    if (isset($_POST['input_checked'])) {
        $input_checked = $_POST['input_checked'];
        // print_r($input_checked);

      foreach( $input_checked as $delete_id){
        $delete_mutiple_row = "UPDATE customer SET status_id = TRUE WHERE customer_id='$delete_id' ";
      $result =  $connect->prepare($delete_mutiple_row);
      
      
      }
      if ($result->execute()) {
        echo "success";
       //  echo 1;
       //  print_r($input_checked);
       // return $input_checked;
 
       } else {
        echo "no";
       }
    }else{
       echo 'Please Select Any Row ';
    }
?>
   