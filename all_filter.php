<!--  service filter code -->
<?php
include("conn.php");
 $service_id =isset($_POST['service_id'])  ? $_POST['service_id'] : "";
 $dateRange =isset($_POST['dateRange'])  ? $_POST['dateRange'] : "";
 if (!empty($dateRange)) {
    $dateParts = explode(" - ", $dateRange);
    
    // Check if we have both parts after explode
    if (count($dateParts) === 2) {
        $datefrom = trim($dateParts[0]);
        $dateto = trim($dateParts[1]);
        echo "Date From: $datefrom<br>";
        echo "Date To: $dateto<br>";
    } else {
        // Handle the case where dateRange is not in the expected format
        echo "Invalid date range format.";
        $datefrom = '';
        $dateto = '';
    }
} 

 
 // Assuming the dates are in the format MM/DD/YYYY, you may need to adjust accordingly
 echo "$service_id<br>";

 if(!empty($service_id) && !empty($datefrom)  && !empty($dateto)) {
    $record ="SELECT * FROM customer WHERE status_id = FALSE and curr_date between '$datefrom' and '$dateto' and service_id = $service_id ";
        // echo "hello a";
        }else if( !empty($datefrom)  && !empty($dateto)) {
        $record ="SELECT * FROM customer WHERE status_id = FALSE and curr_date between '$datefrom' and '$dateto' ";
        // echo "hello b";
        }else if(!empty($service_id)) {
        $record = "SELECT * FROM customer where  status_id = FALSE and  service_id = $service_id ";
        // echo "hello c";
        }else{
        echo "Please Select Any Fliter"; ?>
         <?php   exit();
        }

$st= $connect->prepare($record);
$st->execute();
$result=$st->get_result();  
if ($result->num_rows>0) {
 $total_record=$result->num_rows;
 ?>
<h3>Total Number Of search Records : <?=$total_record;?></h3> 
<?php
}
$pageno= isset($_POST['page_no'])?$_POST['page_no']:1;
//  echo $pageno;
$offset=($pageno-1)* $limit;
?>

<form action="" method="post">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><button id="delete" name="delete" type="button">Delete</button></th>
                                    <th>S no.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Message</th>
                                    <th>Service Name</th>
                                    <th>Request Date</th>
                                </tr>
                            </thead>
                            <!-- ajax response get in filter_data id -->
                            <tbody id="filter_data">
 
    <?php 
     if(!empty($service_id) && !empty($datefrom)  && !empty($dateto)) {
       echo "a";
        $sql ="SELECT * FROM customer WHERE status_id = FALSE and curr_date between '$datefrom' and '$dateto' and service_id = $service_id LIMIT {$limit} OFFSET {$offset}";

            }else if( !empty($datefrom)  && !empty($dateto)) {
       echo "b";
               
            $sql ="SELECT * FROM customer WHERE status_id = FALSE and curr_date between '$datefrom' and '$dateto' LIMIT {$limit} OFFSET {$offset}";

            }else if(!empty($service_id)) {
       echo "c";
               
                $sql = "SELECT * FROM customer where  status_id = FALSE and  service_id = $service_id LIMIT {$limit} OFFSET {$offset}";

            }else{
                echo "click to dashboard otherwise logout ka option bhi hai";
                die();
            }

    
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $res=$stmt->get_result();  
    if ($res->num_rows>0) {
        $sno=0;
        while($data = $res->fetch_assoc()){
            $sno++;
            $customer_id=$data['customer_id'];
            $name=$data['customer_name'];
            $customer_email=$data['customer_email'];
            $customer_phone=$data['customer_phone'];
            $curr_date=$data['curr_date'];
            $message=$data['message'];
            $service_id=$data['service_id'];
 ?>
                                <tr id="<?=$customer_id?>">
                                    <td><input type="checkbox" name="checkbox"  class="deleteCheckbox"
                                    value="<?=$customer_id ?>"></td>
                                    <td>
                                        <?=$sno ?>
                                    </td>
                                    <td>
                                        <?=$name ?>
                                    </td>
                                    <td>
                                        <?=$customer_email ?>
                                    </td>
                                    <td>
                                        <?=$customer_phone ?>
                                    </td>
                                    <td>
                                        <?=$message ?>
                                    </td>
                                    <?php
            if ($service_id==Null) {
                $service_name="Null"; }else{
                $sql ="SELECT service_name from service where service_id=$service_id";
             $ser=$connect->query($sql);
             if ($ser->num_rows>0) {
                 $data = $ser->fetch_assoc();
                 $service_name=$data['service_name'];} } 
 ?>
                                    <td>
                                        <?=$service_name ?>
                                    </td>
                                    <td>
                                        <?=$curr_date ?>
                                    </td>
                                </tr>
                                <?php
    }
   }else{
    echo "User Not Found";
   }
 ?>
                            </tbody>
                        </table>
                        <div class="error">
                            <?php if (isset($wrong_date)) {
                         echo "$wrong_date !<br>";
                        }?>
                        </div>
                    </form>
                    <!-- select all -->
                    <div class="select_all">
                        <button id="selectAll" type="button">Select All</button>
                        <button id="clearAll" type="button">Clear All</button>
                    </div>

                    <div class="pagging">
                        <ul class="pagelist">
                            <?php if ($pageno > 1) {?>
                            <li><a class="fpage-link" id="<?=($pageno - 1) ?>">Prev</a></li>
                            <?php }?>

                            <?php
                       if (isset($total_record)) {
                        $total_page=ceil( $total_record/$limit);
                          if (isset($total_page)) {
                        
                      
                        for ($i=1; $i <=$total_page ; $i++) { 
                            if ($i == $pageno) {
                              $active="pageactive";
                            } else {
                               $active="";
                            }?>
                            <li class="<?=$active ?>"><a class="fpage-link" id="<?=$i ?>"> <?=$i ?> </a></li>
                            <?php
                        }
                        }
                        ?>
                            <?php if ($total_page > $pageno) {?>
                            <li><a class="fpage-link" id="<?=($pageno + 1) ?>"
                                    href="dashboard.php?page=<?=($pageno + 1) ?>">Next</a></li>
                            <?php }    }

                            
                           ?>
                        </ul>
                    </div>
