
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment.min.js"></script>
<?php
include "./sidebar_responsive.php";
?>
<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<link rel="stylesheet" href="./style_ls.css">
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
<style>

.content-row{
  display:flex;
}
.card{
  width:100%;
  height:fit-content;
  margin-right:10px;
  border-radius:0px 10px 10px 10px;
}
	
	
.topic-in-card{
  font-size:18px;
  padding: 10px 10px 10px 10px;	
  margin:0px;
  color:#ffffff;
  font-weight:bold;
  background-color:#097CC0;
  width:fit-content;
  border-radius: 10px 10px 0px 0px;
}
.btn-in-card{
  padding:5px;
  width:100%;
  max-width:100px;
  margin:3px;
  white-space:nowrap;
  background:none;
  border:none;
  box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2), inset 0 -3px 0 #097CC0;
}
</style>
</head>

<body>
    <div class="main_responsive">
        <header class="w3-container w3-row" style="padding-top:22px">
        <br>
            <div class="w3-col">
            <h5><b>
                    <span class=" ls-head w3-xxlarge"> Dashboard </span>
                    </span>
            </b></h5>
            </div>
        </header>

        <div style="display:flex;">
			<div style="width:100%;" hidden>
                <div class="text-content">
                    <p class="text-topic">ปี  </p>
                    <select class="text-sub-content inputs input-text sub-select" id="year" style="margin-left :20px">
                    <option value='2024'>2024</option>
                    <option value='2023'>2023</option>
                    <option value='2022'>2022</option>
                    </select>
                </div>
			</div>
		</div>

        <br>
        <div class="w3-row w3-container">

            <div class="w3-row">
                <p class="topic-in-card">Ticket Service</p>
                <div class="card w3-border">
                    <div id="chart_ticket" style="height:600px"></div>
                    <div style="display:flex; padding:15px 15px 5px 15px; justify-content:center;">
                        <button type="button" class="btn-in-card txt_year" onclick="callTicketStatus('all');">2023</button>
                        <button type="button" class="btn-in-card" onclick="callTicketStatus('jan');">JAN</button>
                        <button type="button" class="btn-in-card" onclick="callTicketStatus('feb');">FEB</button>
                        <button type="button" class="btn-in-card" onclick="callTicketStatus('mar');">MAR</button>
                        <button type="button" class="btn-in-card" onclick="callTicketStatus('apr');">APR</button>
                        <button type="button" class="btn-in-card" onclick="callTicketStatus('may');">MAY</button>
                        <button type="button" class="btn-in-card" onclick="callTicketStatus('jun');">JUN</button>
                        <button type="button" class="btn-in-card" onclick="callTicketStatus('jul');">JUL</button>
                        <button type="button" class="btn-in-card" onclick="callTicketStatus('aug');">AUG</button>
                        <button type="button" class="btn-in-card" onclick="callTicketStatus('sep');">SEP</button>
                        <button type="button" class="btn-in-card" onclick="callTicketStatus('oct');">OCT</button>
                        <button type="button" class="btn-in-card" onclick="callTicketStatus('nov');">NOV</button>
                        <button type="button" class="btn-in-card" onclick="callTicketStatus('dec');">DEC</button>
                    </div>

                    <div class="content-row" style="display: flex; padding:20px; flex-wrap:nowrap;">
                        <div style="flex:2.8 0 50%;">
                            <div id="chart_ticket_company" style="height:500px"></div>
                        </div>
                        <!-- <span style="flex:0.4 0 2%;"></span> -->
                        <div style="flex:2.8 0 50%;">
                            <div id="chart_technician" style="height:500px"></div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="w3-row">
                <p class="topic-in-card">PM Contract</p>
                <div class="card w3-border">
                        <div id="chart_pm_contract" ></div>
                </div>
            </div>
            <br>
            <div class="w3-row">
                <p class="topic-in-card">Quotation</p>
                <div class="card w3-border">
                        <div id="chart_quotation" style="height:500px"></div>
                </div>
            </div>
            <br>
            <div class="w3-row">
                <p class="topic-in-card">Status Quotation</p>
                <div class="card w3-border">
                    <div id="chart_status_quotation" style="height:500px"></div>
                </div>
            </div>
        </div>

        <div style="margin-top:20px;">
            
        </div>
        <div style="margin-top:20px;">
            
        </div>
        <div style="margin-top:20px;">
        </div>

        
        
    </div>
</body>
<script>
    var today = moment();
    $(document).ready(function () {
	    $('#aDashboard').addClass('active');
        $("#month").val(today.format('MM'));
        $("#year").val(today.format('YYYY'));
        $('.txt_year').html(today.format('YYYY'));
        // $("#month").change(function() {

        // var startOfMonth = moment($('#year').val()+'-'+$('#month').val()).startOf('month').format('YYYY-MM-DD');
        // var endOfMonth   = moment($('#year').val()+'-'+$('#month').val()).endOf('month').format('YYYY-MM-DD');
        //     $('#month').get_ticket(startOfMonth , endOfMonth);
        // });
        $("#year").change(function() {
        var startOfMonth = moment($('#year').val()+'-01-01').format('YYYY-MM-DD');
        var endOfMonth   = moment($('#year').val()+'-12-31').format('YYYY-MM-DD');
            $('#month').get_ticket(startOfMonth , endOfMonth);
            $('#month').get_company_group(startOfMonth , endOfMonth,"กลุ่มบริษัทปี "+$('#year').val());
            $('#month').get_technician(startOfMonth , endOfMonth);
            $('#month').get_pm_contract(startOfMonth , endOfMonth);
            $('#month').get_quotation(startOfMonth , endOfMonth);
            $('#month').get_status_quotation(startOfMonth , endOfMonth);
        });

    });

    function callTicketStatus(buttonStatus){
        var start_date;
        var end_date;
		var title = "";
		console.log(buttonStatus);
        switch(buttonStatus){
            case 'jan' : start_date = (today.format('YYYY')+'-01-01');end_date = (today.format('YYYY')+'-01-31'); title ="กลุ่มบริษัทเดือนมกราคม" ; break;
            case 'feb' : start_date = (today.format('YYYY')+'-02-01');end_date = (today.format('YYYY')+'-02-28'); title ="กลุ่มบริษัทเดือนกุมภาพันธ์" ; break;
            case 'mar' : start_date = (today.format('YYYY')+'-03-01');end_date = (today.format('YYYY')+'-03-31'); title ="กลุ่มบริษัทเดือนมีนาคม" ; break;
            case 'apr' : start_date = (today.format('YYYY')+'-04-01');end_date = (today.format('YYYY')+'-04-30'); title ="กลุ่มบริษัทเดือนเมษายน" ; break;
            case 'may' : start_date = (today.format('YYYY')+'-05-01');end_date = (today.format('YYYY')+'-05-31'); title ="กลุ่มบริษัทเดือนพฤษภาคม" ; break;
            case 'jun' : start_date = (today.format('YYYY')+'-06-01');end_date = (today.format('YYYY')+'-06-30'); title ="กลุ่มบริษัทเดือนมิถุนายน" ; break;
            case 'jul' : start_date = (today.format('YYYY')+'-07-01');end_date = (today.format('YYYY')+'-07-31'); title ="กลุ่มบริษัทเดือนกรกฎาคม" ; break;
            case 'aug' : start_date = (today.format('YYYY')+'-08-01');end_date = (today.format('YYYY')+'-08-31'); title ="กลุ่มบริษัทเดือนสิงหาคม" ; break;
            case 'sep' : start_date = (today.format('YYYY')+'-09-01');end_date = (today.format('YYYY')+'-09-30'); title ="กลุ่มบริษัทเดือนกันยายน" ; break;
            case 'oct' : start_date = (today.format('YYYY')+'-10-01');end_date = (today.format('YYYY')+'-10-31'); title ="กลุ่มบริษัทเดือนตุลาคม" ; break;
            case 'nov' : start_date = (today.format('YYYY')+'-11-01');end_date = (today.format('YYYY')+'-11-30'); title ="กลุ่มบริษัทเดือนพฤศจิกายน" ; break;
            case 'dec' : start_date = (today.format('YYYY')+'-12-01');end_date = (today.format('YYYY')+'-12-31'); title ="กลุ่มบริษัทเดือนธันวาคม" ; break;
            case 'all' : start_date = (today.format('YYYY')+'-01-01');end_date = (today.format('YYYY')+'-12-31'); title ="กลุ่มบริษัทปี "+$('#year').val() ; break;
        }
        $('#month').get_company_group(start_date , end_date, title);
        $('#month').get_technician(start_date , end_date);
    }
    $.fn.get_ticket = function(startOfMonth , endOfMonth){

        $.post('./personal/get_graph.php', {
            event:'get_ticket',
            start:startOfMonth,
            end:endOfMonth,
            member: localStorage.getItem('member')
        }, function(data){
                console.log(data);
            if (data.length >0) {
                var arr_data = [['Date', 'Complete','Pending','Open', 'Close' ]];
                $.each( data, function(  index, arr ) {
                    arr_data.push([new Date(arr.s_date), parseFloat(arr.s_complete), parseFloat(arr.s_pending), parseFloat(arr.s_open), parseFloat(arr.s_close)]);
                });

                arr_data.push([new Date($("#year").val()+'-01'), null, null, null ,null]);
                arr_data.push([new Date($("#year").val()+'-12'), null, null, null ,null]);

                var data = google.visualization.arrayToDataTable(arr_data);
                var options = {
                    title: 'Ticket Service รายเดือน',
                    isStacked: true,
                    bar: { groupWidth: '85%' },
                    colors: ["#59C1BD","#097CC0","#FFE15D","#EB455F","#59C1BD"]
                };

                var chart = new google.visualization.ColumnChart(document.getElementById('chart_ticket'));
                chart.draw(data, options);
            }
        }, 'json');
    };
    $.fn.get_company_group = function(startOfMonth , endOfMonth, title){
		console.log(startOfMonth,endOfMonth);
        $.post('./personal/get_graph.php', {
            event:'get_company_group',
            start:startOfMonth,
            end:endOfMonth,
            member: localStorage.getItem('member')
        }, function(data){
                console.log(data);
            if (data.length >0) {
                var arr_data = [['Group', 'Total' ]];
                $.each( data, function(  index, arr ) {
                    arr_data.push([(arr.company_group), parseFloat(arr.total)]);
                });
                var data = google.visualization.arrayToDataTable(arr_data);
                var options = {
					title: title,
                    fontSize : 20,
                    pieSliceText: 'value',
                    colors: ["#fecf4a","#00A4E4","#3366CC","#ff251b"]
                };
                var chart = new google.visualization.PieChart(document.getElementById('chart_ticket_company'));
                chart.draw(data, options);
            }else{
                // var arr_data = [['Group', 'Total' ]];
                // var data = google.visualization.arrayToDataTable(arr_data);
                // chart.draw(data, options);

                $("#chart_ticket_company").html("<h4>Sorry, not info available</h4>");
            }
        }, 'json');
    };
    $.fn.get_technician = function(startOfMonth , endOfMonth){
		console.log(startOfMonth,endOfMonth);
        $.post('./personal/get_graph.php', {
            event:'get_technician',
            start:startOfMonth,
            end:endOfMonth,
            member: localStorage.getItem('member')
        }, function(data){
                console.log(data);
            if (data.length >0) {
                var arr_data = [['Group', 'Total' ]];
                $.each( data, function(  index, arr ) {
                    arr_data.push([(arr.notify_type), parseFloat(arr.total)]);
                });
                var data = google.visualization.arrayToDataTable(arr_data);
                var options = {
					title: "Type",
                    fontSize : 20,
                    pieSliceText: 'value',
                    // colors: ["#fecf4a","#00A4E4","#3366CC","#ff251b"]
                };
                var chart = new google.visualization.PieChart(document.getElementById('chart_technician'));
                chart.draw(data, options);
            }else{
                // var arr_data = [['Group', 'Total' ]];
                // var data = google.visualization.arrayToDataTable(arr_data);
                // chart.draw(data, options);

                $("#chart_technician").html("<h4>Sorry, not info available</h4>");
            }
        }, 'json');
    };
    $.fn.get_pm_contract = function(startOfMonth , endOfMonth){
        $.post('./personal/get_graph.php', {
            event:'get_pm_contract',
            start:startOfMonth,
            end:endOfMonth,
            member: localStorage.getItem('member')
        }, function(data){
                console.log('get_pm_contract',data);
            if (data.length >0) {
                    var arr_data = [];
                    data.forEach((arr, index_a) => {
                        arr_data.push([new Date(arr.notify_date), parseFloat(arr.total)]);
                    });
                    var dataTable = new google.visualization.DataTable();
                    dataTable.addColumn({ type: 'date', id: 'Date' });
                    dataTable.addColumn({ type: 'number', id: 'Total' });
                    dataTable.addRows(arr_data);
                    var chart = new google.visualization.Calendar(document.getElementById('chart_pm_contract'));

                    var options = {
                        responsive: true,
                        // title: ,
                        height: 300,
                        colorAxis: {
                            colors: ['#097CC0','#097CC0','#097CC0','#097CC0'],
                            values: [1,2,3,4]
                        },
                        calendar: {
                            cellSize: 25,
                        }
                    };
                    chart.draw(dataTable, options);
            }else{
                $("#chart_pm_contract").html("<h4>Sorry, not info available</h4>");
            }
        }, 'json');
    };
    $.fn.get_quotation = function(startOfMonth , endOfMonth){

        var id = localStorage.getItem("id") ;
        var type = localStorage.getItem("type") ;

        $.post('./personal/get_graph.php', {
            event:'get_quotation',
            start:startOfMonth,
            end:endOfMonth,
            user_id:id,user_type:type,
            member: localStorage.getItem('member')
        }, function(data){
                console.log('get_quotation',data);
            if (data.length >0) {
                var arr_data = [['Date','Total',{ role: 'annotation' } ]];
                $.each( data, function(  index, arr ) {
                    arr_data.push([new Date(arr.s_date), parseFloat(arr.total_price), parseFloat(arr.total_price)]);
                });

                arr_data.push([new Date($("#year").val()+'-01'), null, null]);
                arr_data.push([new Date($("#year").val()+'-12'), null, null]);

                var data = google.visualization.arrayToDataTable(arr_data);
                var options = {
                    title: 'Quotation รายเดือน',
                    isStacked: true,
                    bar: { groupWidth: '85%' },
                    colors: ["#59C1BD","#097CC0","#FFE15D","#EB455F","#59C1BD"]
                };

                var chart = new google.visualization.ColumnChart(document.getElementById('chart_quotation'));
                chart.draw(data, options);
            }
        }, 'json');
    };

    $.fn.get_status_quotation = function(startOfMonth , endOfMonth){

        $.post('./personal/get_graph.php', {
            event:'get_status_quotation',
            start:startOfMonth,
            end:endOfMonth,
            member: localStorage.getItem('member')
        }, function(data){
                console.log(data);
            if (data.length >0) {
                // var arr_data = [['Date', 'Lost','100% WIN','80% Final Quotation','50% Quotation','30% POC','10% Pipeline']];
                var arr_data = [['Date', 'Lost','10% Pipeline','30% POC','50% Quotation','80% Final Quotation','100% WIN']];
                $.each( data, function( index, arr ) {
                    // arr_data.push([new Date(arr.s_date), parseFloat(arr.s_lost), parseFloat(arr.s_win), parseFloat(arr.s_final_quotation), parseFloat(arr.s_quotation),parseFloat(arr.s_poc), parseFloat(arr.s_pipeline)]);
                    arr_data.push([new Date(arr.s_date), parseFloat(arr.s_lost), parseFloat(arr.s_pipeline), parseFloat(arr.s_poc), parseFloat(arr.s_quotation), parseFloat(arr.s_final_quotation), parseFloat(arr.s_win)]);
                });
        
                arr_data.push([new Date($("#year").val()+'-01'), null, null, null, null, null, null]);
                arr_data.push([new Date($("#year").val()+'-12'), null, null, null, null, null, null]);

                var data = google.visualization.arrayToDataTable(arr_data);
                var options = {
                    title: 'Status Quotation รายเดือน',
                    isStacked: true,
                    bar: { groupWidth: '85%' },
                    colors: ["#EB455F","#59C1BD","#097CC0","#FFE15D","#B799FF","#A2FF86","#59C1BD"]
                };

                var chart = new google.visualization.ColumnChart(document.getElementById('chart_status_quotation'));
                chart.draw(data, options);
            }
        }, 'json');
    };
//////////
    google.charts.load('current', {packages: ['corechart', 'line','calendar']});

    
    setTimeout(
    function() 
    {
        $('#year').change();
    }, 500);

    $.post('/user/get_user.php', { event:"get_all_type_permission_by_id", id:localStorage.getItem("id") }, function(data){
        console.log(localStorage.getItem("id") , data);
        $.each( data, function( key, value ) {
            localStorage.setItem("permission",value.permission);
        });
    }, 'json');

    $.post('/user/get_user.php', { event:"get_active_by_id", id:localStorage.getItem("id") }, function(data){
        console.log('get_active_by_id' , data[0].active);
        if(data[0].active=="noactive"){
            alert('User นี้ไม่ Active');
            localStorage.clear()
            window.location.href="./login";
        }
    }, 'json');


</script>

</html>