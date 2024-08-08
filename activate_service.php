<?php 
include('conn.php');
if (isset($_POST['serviceId'])) {
    $serviceId=$_POST['serviceId'];

    $sql ="SELECT isactive from service where service_id=  $serviceId "; 
    $result= $connect->query($sql);
    // $result=$stmt->get_result();
    if ($result->num_rows>0) {
        $data =$result->fetch_assoc();
            $isactive=$data['isactive'];
        $currStatus = $isactive == 1 ? FALSE:  TRUE;
        echo $currStatus;
          
            // update isactive status

            $updateStatus="UPDATE service set isactive = ? where service_id = ?";
            $stmt= $connect->prepare($updateStatus);
            $stmt->bind_param("ii",$currStatus, $serviceId);
           if ( $stmt->execute()) {
             echo "successfully updated";
            
           }else{
            echo "status not pass";
           }
    }
}else {
   echo "error";
}

?>