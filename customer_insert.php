<?php 
  include("conn.php");
 
  $formvalid=true;
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $uname=trim($_POST['username']);
          $email= trim($_POST['mail']);
          $number= trim($_POST['number']);
          $message= $_POST['message']; 
          $service_id= isset($_POST['service_id'])?$_POST['service_id']: "";
      
      if (empty($uname)) {
          echo  "Name ,";
          $formvalid=false;
        } else 
        if (!preg_match("/^[a-zA-Z-' ]*$/",$uname)) {
          echo "Only letters and white space allowed ,";
        $formvalid=false;
        
      }
    //   email
    if (empty($email)) {
        echo  "Email ,";
        $formvalid=false;
      }
    //  phone number
    if (empty($number)) {
      echo  "Number ";
        $formvalid=false;
      }else if (!preg_match("/^\d{10}$/",$number)) {
        echo "Only Numbers allowed with max length 10 ,";
          $formvalid=false;
      }
      $curr_date=(date("Y-m-d"));
      if ($formvalid==true) {
        if ($service_id){
          $sql = "INSERT INTO customer (customer_name , customer_email , customer_phone, message, service_id, curr_date )
            VALUES (?, ?, ?, ?, ?, ?)";
          $stmt = $connect->prepare($sql);
          $stmt->bind_param("ssssis", $uname, $email, $number  ,$message, $service_id, $curr_date);
            }
          else{
            $sql = "INSERT INTO customer (customer_name , customer_email , customer_phone, message, curr_date )
            VALUES (?, ?, ?, ?, ?)";
          $stmt = $connect->prepare($sql);
          $stmt->bind_param("sssss", $uname, $email, $number  ,$message, $curr_date);
          }
       
       if ($stmt->execute()) {
        // select customer name from table
           $customer ="SELECT customer_name from customer where customer_name=?";
           $statement=$connect->prepare($customer);
           $statement->bind_param("s",$uname);
           $statement->execute();
            $res=$statement->get_result();  
           if ($res->num_rows>0) {
               $data = $res->fetch_assoc();
               $customer_name=$data['customer_name']; 
              echo $customer_name;
             }else{
              echo "not inserted data";
             }
            
        //select customer name from table::::::::::::::::::::end

       } else {
           echo "please enter correct information"; 
       }
      }
      
        $connect->close();
    } 

?>