<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
 
<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<p>
 <!-- Check 
http://www.daterangepicker.com/#config 
for More Info
  -->
<p>
<input type="text" id="reportrange"  class="pull-left" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;">
                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                        <span></span> <b class="caret"></b>



<script>
    $(function() {

var start = moment().subtract(29, 'days');
var end = moment();
$("#reportrange").change(function () {
                var dateRange  = $(this).val();
                console.log(dateRange);
});
function cb(start, end) {
    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
}

$('#reportrange').daterangepicker({
    startDate: start,
    endDate: end,
    ranges: {
       'Today': [moment(), moment()],
       'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
       'Last 7 Days': [moment().subtract(6, 'days'), moment()],
       'Last 30 Days': [moment().subtract(29, 'days'), moment()],
       'This Month': [moment().startOf('month'), moment().endOf('month')],
       'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    }
}, cb);

cb(start, end);

});




// $("#reportrange").change(function () {
//                 var dateRange  = $(this).val();
//                 var service_id=$("#search_service").val();

//                 console.log(dateRange, service_id);

//                 $.ajax({
//                     type: 'POST',
//                     url: 'all_filter.php',
//                     data: {
//                         service_id:service_id,
//                         dateRange:dateRange
//                     },
//                     success: function (response) {
//                         $(".table-data").html(response);
//                     }
//                  })
//             })
//             $(function() {

//             var start = moment().subtract(29, 'days');
//             var end = moment();
//             function cb(start, end) {
//                 $('#reportrange span').html(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
            
//             }

//             $('#reportrange').daterangepicker({
//                 startDate: start,
//                 endDate: end,
//                 locale: {
//                     format: 'YYYY-MM-DD'
//                 },
//                 ranges: {
//                 'Today': [moment(), moment()],
//                 'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
//                 'Last 7 Days': [moment().subtract(6, 'days'), moment()],
//                 'Last 30 Days': [moment().subtract(29, 'days'), moment()],
//                 'This Month': [moment().startOf('month'), moment().endOf('month')],
//                 'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
//                 }
//             }, cb);
//             cb(start, end);
//               })
</script>