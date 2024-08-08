
<!-- updated search filter code -->
<?php
include("conn.php");
if(isset($_POST['searchText']) && !empty($_POST['searchText'])) {
    $searchText= $_POST['searchText'];

$record="SELECT * FROM customer WHERE status_id = FALSE and customer_name like '%$searchText%' ";
$stmt = $connect->prepare($record);
$stmt->execute();
$res=$stmt->get_result();  
if ($res->num_rows>0) {
 $total_record=$res->num_rows;
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


    $sql = "SELECT * FROM customer where  status_id = FALSE and customer_name like '%$searchText%' LIMIT {$limit} OFFSET {$offset}";
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
                       
                    </form>
                    <!-- select all -->
                    <div class="select_all">
                        <button id="selectAll" type="button">Select All</button>
                        <button id="clearAll" type="button">Clear All</button>
                    </div>

                    <div class="pagging">
                        <ul class="pagelist">
                            <?php if ($pageno > 1) {?>
                            <li><a class="searchpage-link" id="<?=($pageno - 1) ?>" href="dashboard.php?page=<?=($pageno - 1) ?>">Prev</a></li>
                            <?php }?>

                            <?php
                        $record="SELECT * FROM customer WHERE status_id = FALSE and customer_name like '%$searchText%' ";
                        $stmt = $connect->prepare($record);
                        $stmt->execute();
                        $res=$stmt->get_result();  
                        if ($res->num_rows>0) {
                         $total_record=$res->num_rows;
                        $total_page=ceil( $total_record/$limit);
                          if (isset($total_page)) {
                        
                      
                        for ($i=1; $i <=$total_page ; $i++) { 
                            if ($i == $pageno) {
                              $active="pageactive";
                            } else {
                               $active="";
                            }?>
                            <li class="<?=$active ?>"><a class="searchpage-link" id="<?=$i ?>" href=""> <?=$i ?> </a></li>
                            <?php
                        }
                        }
                        ?>
                            <?php if ($total_page > $pageno) {?>
                            <li><a class="searchpage-link" id="<?=($pageno + 1) ?>"
                                    href="dashboard.php?page=<?=($pageno + 1) ?>">Next</a></li>
                            <?php }    }

                            
                            }else{
                            echo "please select name for search"; }?>
                        </ul>
                    </div>
