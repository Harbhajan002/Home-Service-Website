
<?php 
include("dashboard_header.php");

        // <!-- nav bar section::  -->
      include("navigation.php"); ?>
            <!-- main section:: -->
            <div class="a3" id="service">
                <!-- date range filter -->
                <div class="multi-filter">
                     
                    <div class="date-picker">
                    <p>
                    <!-- Check 
                    http://www.daterangepicker.com/#config 
                    for More Info
                    -->
                    <p>
                    <input type="text" id="reportrange"  class="pull-left" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;">
                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                        <span></span> <b class="caret"></b>
                <!-- date range filter -->
                    </div>
                    


                    <!-- service filter -->
                    <select name="select_service" id="search_service" class="select_service">
                      <option value="">Select Service</option>
                        <?php
                         $service_name = "SELECT service_id, service_name FROM service ";
                                   $stmt = $connect->prepare($service_name);
                                   $stmt->execute();
                                   $res=$stmt->get_result();  
                                   if ($res->num_rows>0) {
                                    while ($data =$res->fetch_assoc()) {
                                        $service_id=$data['service_id'];
                                        $service_name=$data['service_name'];
                                        ?>
                        <option value="<?=$service_id ?>"><?=$service_name ?></option>
                        <?php };  }  ?>
                    </select>
                </div>
                <hr>
                <h4 class="error" id="output">
                    <?php if (isset($errorMassage)) {
                       echo $errorMassage;
                    }?>
                </h4>
                <!--customer service table -->
                <div class="table-data">
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <!-- <script src="./assets/external/script.js"></script> -->

    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
    
    <!-- Include Date Range Picker -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

    <script>
        $(document).ready(function () {
            //customer message with paging.php
            function loadTable(pageno) {
                console.log("dashboard", pageno);

                $.ajax({
                    url: 'message.php',
                    type: 'POST',
                    data: { page_no: pageno },
                    success: function (response) {
                        $('.table-data').html(response);
                    }
                });
            }
            loadTable();
             $(document).on("click", ".page-link", function (e) {
                console.log("dashboard");
                e.preventDefault();
                let page_id = $(this).attr('id');
                loadTable(page_id);
               
            });

            //all filter .php paging:::::::::::::::::::
            function loadTablefilter(pageno, dateRange ,service_id) {
                console.log("allfilter", pageno);

                $.ajax({
                    url: 'all_filter.php',
                    type: 'POST',
                    data: { page_no: pageno ,
                        dateRange:dateRange,
                        service_id:service_id
                    },
                    success: function (response) {
                        $('.table-data').html(response);
                    }
                });
            }
            // loadTablefilter();
             //paging rows
             $(document).on("click", ".fpage-link", function (e) {
                e.preventDefault();
                let filter_page_id = $(this).attr('id');
                var dateRange  = $("#reportrange").val();
                var service_id=$("#search_service").val();
                console.log("allfilter", filter_page_id);

                loadTablefilter(filter_page_id, dateRange, service_id);
               
            });
            
              // date range picker without paging
              $(function() {
                function handleDateRangeChange() {
                    var dateRange = $('#reportrange').val();
                    var service_id = $("#search_service").val();

                    console.log(dateRange, service_id);

                    $.ajax({
                        type: 'POST',
                        url: 'all_filter.php',
                        data: {
                            service_id: service_id,
                            dateRange: dateRange
                        },
                        success: function(response) {
                            $(".table-data").html(response);
                        }
                    });
                }

                var start = moment().subtract(29, 'days');
                var end = moment();
                function cb(start, end) {
                    $('#reportrange span').html(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
                }

                $('#reportrange').daterangepicker({
                    startDate: start,
                    endDate: end,
                    locale: {
                        format: 'YYYY-MM-DD'
                    },
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    }
                }, cb);

                $('#reportrange').change(handleDateRangeChange); // Bind the function to the change event
            });

              

            //select all for delete
            $(document).on('click', '#selectAll', function () {
                   
                var checkboxes = document.querySelectorAll('.deleteCheckbox');
            checkboxes.forEach(function(checkbox){
            checkbox.checked = true;
            });
               });
            
               $(document).on('click',' #clearAll', function () {
                var checkboxes = document.querySelectorAll('.deleteCheckbox');
            checkboxes.forEach(function(checkbox){
            checkbox.checked = false;
            });
            });


           // service dropdown with out filter
           $("#search_service").change(function () {
            var service_id=$(this).val();
            var dateRange  = $("#reportrange").val();
                     $.ajax({
                         type:'POST',
                         url:'all_filter.php',
                         data: {
                        service_id:service_id,
                        dateRange:dateRange
                    },
                        success: function (service_res) {
                           $(".table-data").html(service_res);

                            console.log(service_res);
                        }
                     })
           });
            
             //search filter with paging
             function loadservice(pageno, searchText) {
                console.log("searchpage", searchText);

                $.ajax({
                    url: 'search_filter.php',
                    type: 'POST',
                    data: { page_no: pageno,
                        searchText: searchText
                    },
                    success: function (response) {
                        $('.table-data').html(response);
                    }
                });
            }
            // loadTablefilter();
             //paging rows
             $(document).on("click", ".searchpage-link", function (e) {
                e.preventDefault();
                let service_page_id = $(this).attr('id');
                var searchText = $("#search").val();
                loadservice(service_page_id, searchText);
               
            });

        //search input without  filter
        $("#search").keyup(function () {
                        var searchText = $(this).val();
                        $.ajax({
                            type: 'POST',
                            url: 'search_filter.php',
                            data: {
                                searchText: searchText
                            },
                            success: function (response) {
                                $(".table-data").html(response);
                            }
                })
            });
           

            //delete  filter 
            $(document).on('click',' #delete', function () {
                console.log("clicked delete btn");
                var input_checked = []; 
                $('input[name="checkbox"]:checked').each(function() {
                    input_checked.push($(this).val());
                  
                });
                if (confirm("Are you sure to delete", $(this).val())) {
                    $.ajax({
                    type: 'POST',
                    url: 'delete_filter.php',
                    data: {
                        input_checked: input_checked,                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
                    },
                    success: function (res) {
                        $("#output").html(res);
                       
                        
                        if (res.trim()==="success") {
                       
                        input_checked.forEach(e => {
                    
                         $("#"+e).fadeOut(1000);
                       });
                        } else {
                         console.log("not updated service");                            
                        }
                    }
                })
                }
            });


          
           
        })
    </script>
</body>
</html>