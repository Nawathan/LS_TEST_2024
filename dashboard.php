
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment.min.js"></script> -->
<?php
include "./sidebar_responsive.php";
?>
<!DOCTYPE html>
<html>
<head>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<link rel="stylesheet" href="./style_ls.css">
<!-- <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet"> -->
</head>

<style>
#all:checked + .button-label {
  background: #094067;
  color: #ffffff;
	
}

.button-label {
  cursor: pointer;
  color: #fff;
  background-color:#2196F3;
  /* background: #f6f6f6; */
}
.button-label:hover {
  background: #094067;
  color: #ffffff;
  /* box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2), inset 0 -3px 0 rgba(0, 0, 0, 0.32); */
}
.hidden {
  display: none;
}

</style>

<body>
    <div class="main_responsive">
        <header class="w3-container w3-row" style="padding-top:22px">
        <br>
            <div class="w3-col">
            <h5><b>
                    <span class=" ls-head w3-xxlarge"> Dashboard </span>

                <div class="w3-dropdown-hover w3-right">
                    <button class="w3-button w3-padding" id="btn_announcement"><i class="w3-large fa fa-bullhorn w3-xxxlarge ls-red" aria-hidden="true"></i></button>
                    <!-- <div class="w3-dropdown-content w3-bar-block w3-border" id="div_announcement" style="right:0; min-width: 800px!important">
                    </div> -->
                </div>
                </b></h5>
            </div>
        </header>

        <div class="w3-row">
        </div>
        <div class="w3-row">
            <div class="w3-row w3-row-padding w3-margin-bottom">
                <!-- <div class="w3-col m1"><div id="b_all" class="w3-container button-label w3-padding-16" onclick="callTicketStatus('all');"><div class="w3-xlarge w3-center txt_year">XXXX</div></div></div> -->
                <div class="w3-col m12">
                    <div class="w3-row w3-row-padding w3-margin-bottom">
                        <div class="w3-col m1"><div id="b_Jan" class="w3-container button-label w3-padding-16" onclick="callTicketStatus('jan');"><div class="w3-xlarge w3-center">JAN</div></div></div>
                        <div class="w3-col m1"><div id="b_Feb" class="w3-container button-label w3-padding-16" onclick="callTicketStatus('feb');"><div class="w3-xlarge w3-center">FEB</div></div></div>
                        <div class="w3-col m1"><div id="b_Mar" class="w3-container button-label w3-padding-16" onclick="callTicketStatus('mar');"><div class="w3-xlarge w3-center">MAR</div></div></div>
                        <div class="w3-col m1"><div id="b_Apr" class="w3-container button-label w3-padding-16" onclick="callTicketStatus('apr');"><div class="w3-xlarge w3-center">APR</div></div></div>
                        <div class="w3-col m1"><div id="b_May" class="w3-container button-label w3-padding-16" onclick="callTicketStatus('may');"><div class="w3-xlarge w3-center">MAY</div></div></div>
                        <div class="w3-col m1"><div id="b_Jun" class="w3-container button-label w3-padding-16" onclick="callTicketStatus('jun');"><div class="w3-xlarge w3-center">JUN</div></div></div>
                        <div class="w3-col m1"><div id="b_Jul" class="w3-container button-label w3-padding-16" onclick="callTicketStatus('jul');"><div class="w3-xlarge w3-center">JUL</div></div></div>
                        <div class="w3-col m1"><div id="b_Aug" class="w3-container button-label w3-padding-16" onclick="callTicketStatus('aug');"><div class="w3-xlarge w3-center">AUG</div></div></div>
                        <div class="w3-col m1"><div id="b_Sep" class="w3-container button-label w3-padding-16" onclick="callTicketStatus('sep');"><div class="w3-xlarge w3-center">SEP</div></div></div>
                        <div class="w3-col m1"><div id="b_Oct" class="w3-container button-label w3-padding-16" onclick="callTicketStatus('oct');"><div class="w3-xlarge w3-center">OCT</div></div></div>
                        <div class="w3-col m1"><div id="b_Nov" class="w3-container button-label w3-padding-16" onclick="callTicketStatus('nov');"><div class="w3-xlarge w3-center">NOV</div></div></div>
                        <div class="w3-col m1"><div id="b_Dec" class="w3-container button-label w3-padding-16" onclick="callTicketStatus('dec');"><div class="w3-xlarge w3-center">DEC</div></div></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w3-row w3-container w3-margin-bottom">
            <div class="w3-col m9 w3-row-padding">
                <div class=" w3-card w3-container">
                        <div id="chart_ticket" style="height:550px"></div>
                </div>
            </div>
            <div class="w3-col m3 w3-row-padding">
                <div class=" w3-card w3-container">
                    
                    <div class="w3-container">

                        <label class="w3-text-blue"><b>Start Date </b></label>
                        <input class="w3-input w3-border" type="date" id="start_date" onchange="getGraph()">
                        <label class="w3-text-blue"><b>End Date </b></label>
                        <input class="w3-input w3-border" type="date" id="end_date" onchange="getGraph()">
                    </div>
                    <div class="w3-container">
                        <div class="w3-left  ls-green"><h2>Complete</h2></div>
                        <div class="w3-right">
                            <h2 id="sum_complete" class=" w3-bottombar ls-border-green">0</h2>
                        </div>
                    </div>
                    <div class="w3-container">
                        <div class="w3-left  ls-blue"><h2>Inprogress</h2></div>
                        <div class="w3-right">
                            <h2 id="sum_open" class=" w3-bottombar ls-border-blue">0</h2>
                        </div>
                    </div>
                    <div class="w3-container">
                        <div class="w3-left  ls-orange"><h2>Pending</h2></div>
                        <div class="w3-right">
                            <h2 id="sum_pending" class=" w3-bottombar ls-border-orange">0</h2>
                        </div>
                    </div>
                    <div class="w3-container">
                        <div class="w3-left  ls-gray"><h2>Cancel</h2></div>
                        <div class="w3-right">
                            <h2 id="sum_close" class=" w3-bottombar ls-border-gray">0</h2>
                        </div>
                    </div>
                    <div class="w3-row w3-container">
                    <!-- ใกล้/เกินกำหนด SLA -->
                        <button type="button" id="btn_over_sla" class="w3-button w3-margin-bottom"><h3><i class="fa fa-exclamation-triangle ls-red"></i> &nbsp;<span class="w3-large">ใกล้/เกินกำหนด SLA</span></h3></button> 
                        <div class="w3-right">
                            <h2 id="sum_over_sla" class=" w3-bottombar ls-border-red">0</h2>
                        </div>
                    </div>
                    <!-- <div class="w3-row">
                        <div class="w3-half w3-center">
                            <div class="w3-block w3-green w3-section" >
                                <h2 id="sum_service" class="">0</h2>
                                <h4 class=" ">Service</h4>
                            </div>
                        </div>
                        <div class="w3-half w3-center">
                            <div class="w3-block w3-red w3-section" >
                                <h2 id="sum_incident" class="">0</h2>
                                <h4 class=" ">Incident</h4>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>

        <div class="w3-row w3-container w3-margin-bottom">

            <div class="w3-col m6 w3-row-padding">
                <div class=" w3-card w3-container">
                        <div id="chart_ticket_company" style="height:500px"></div>
                </div>
            </div>
            <div class="w3-col m6 w3-row-padding">
                <div class=" w3-card w3-container w3-row-padding w3-margin-bottom">
                        <!-- <div id="chart_technician" style="height:500px"></div> -->
                    <h2 class="ls-head">Claim & Repair</h2>
                    <div class="w3-col m3">
                    <div class="w3-container w3-blue w3-text-white w3-padding-16">
                        <div class="w3-left"><i class="fa fa-suitcase w3-xxxlarge"></i></div>
                        <div class="w3-right">
                        <h2 id="claim_sum_inprogress">0</h2>
                        </div>
                        <div class="w3-clear"></div>
                        <h4>Inprogress</h4>
                    </div>
                    </div>
                    <div class="w3-col m3">
                    <div class="w3-container w3-red w3-padding-16">
                        <div class="w3-left"><i class="fa fa-clock-o w3-xxxlarge"></i></div>
                        <div class="w3-right">
                        <h2 id="claim_sum_over_sla">0</h2>
                        </div>
                        <div class="w3-clear"></div>
                        <h4>Late</h4>
                    </div>
                    </div>

                    <div class="w3-col m3">
                    <div class="w3-container w3-orange w3-text-white w3-padding-16">
                        <div class="w3-left"><i class="fa fa-hourglass-end w3-xxxlarge"></i></div>
                        <div class="w3-right">
                        <h2 id="claim_sum_pending">0</h2>
                        </div>
                        <div class="w3-clear"></div>
                        <h4>Pending</h4>
                    </div>
                    </div>

                    <div class="w3-col m3">
                    <div class="w3-container w3-teal w3-padding-16">
                        <div class="w3-left"><i class="fa fa-check-circle-o w3-xxxlarge"></i></div>
                        <div class="w3-right">
                        <h2 id="claim_sum_complete">0</h2>
                        </div>
                        <div class="w3-clear"></div>
                        <h4>Success</h4>
                    </div>
                    <br>
                    </div>
                    
                </div>
                <div class=" w3-card w3-container w3-row-padding w3-margin-bottom">
                        <!-- <div id="chart_technician" style="height:500px"></div> -->
                    <h2 class="ls-head">Certificate</h2>
                    <div id="chart_certificate" style="height:200px"></div>                    
                </div>
            </div>
            
        </div>
        <div class="w3-row w3-container w3-margin-bottom">

            <div class="w3-col m12 w3-row-padding">
                <div class=" w3-card w3-container w3-row-padding w3-margin-bottom">
                    <div class="w3-col m9">
                        <h2 class="ls-head">Delivery</h2>
                        <div id="chart_delivery" style="height:300px"></div>
                    <br>
                    </div>
                    <div class="w3-col m3">
                                <br>
                        <div class="w3-row">

                            <div class="w3-tag w3-round w3-blue" style="padding:3px">
                                <div class="w3-tag w3-round w3-blue w3-border w3-border-white w3-xlarge" id="current_date">August 29th 2024</div>
                            </div>
                            <div class="w3-row">
                                </div>
                                <input type="hidden" name="current_month" id="current_month" value="2024-08">
                                <div class="card">
                                
                                <div class="w3-col m6 s6 w3-center"><div class="w3-large ">Waiting</div>
                                    <h1 class="ls-blue" id="shipping_waiting">0</h1>
                                </div>
                                <div class="w3-col m6 s6 w3-center"><div class="w3-large">Inprogress</div>
                                    <h1 class="ls-orange" id="shipping_inprogress">0</h1>
                                </div>
                                <div class="w3-col m6 s6 w3-center"><div class="w3-large ">Finish</div>
                                    <h1 class="ls-green" id="shipping_finish">0</h1>
                                </div>
                                <div class="w3-col m6 s6 w3-center"><div class="w3-large">Denied</div>
                                    <h1 class="ls-red" id="shipping_denied">0</h1>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="w3-row w3-container w3-margin-bottom">
            <div class="w3-col m12 w3-row-padding">
                <div class=" w3-card w3-container w3-row-padding w3-margin-bottom">
                        <!-- <div id="chart_technician" style="height:500px"></div> -->
                    <!-- <h1>Job</h1> -->
                    <div class="w3-row">
                        <!-- <div id="chart_pm_contract" ></div> -->
                        <div id="chart_job" ></div>

                    <br>
                    </div>
                </div>
            </div>
        </div>
        <div class="w3-row w3-container w3-margin-bottom">
            <div class="w3-col m12 w3-row-padding">
                <div class=" w3-card w3-container w3-row-padding w3-margin-bottom">
                    <h2 class="ls-head">Quotation</h2>
                    <div class="w3-row w3-col m9">
                        <div id="chart_status_quotation" style="height:500px"></div>
                    </div>
                    <div class="w3-row w3-col m3">
                        <div class=" ls-border-c w3-round w3-container">
                            <h2 class="ls-head">Summary</h2>
                            <div class="w3-container">
                                <div class="w3-left  ls-green"><h2>Win</h2></div>
                                <div class="w3-right">
                                    <h2 id="q_win" class=" w3-bottombar ls-border-green">0</h2>
                                </div>
                            </div>
                            <div class="w3-container">
                                <div class="w3-left  ls-blue"><h2>Inprogress</h2></div>
                                <div class="w3-right">
                                    <h2 id="q_inprogress" class=" w3-bottombar ls-border-blue">0</h2>
                                </div>
                            </div>
                            <div class="w3-container">
                                <div class="w3-left  ls-red"><h2>Lost</h2></div>
                                <div class="w3-right">
                                    <h2 id="q_lost" class=" w3-bottombar ls-border-red">0</h2>
                                </div>
                            </div>
                            <div class="w3-container">
                                <div class="w3-left  ls-gray"><h2>Expire</h2></div>
                                <div class="w3-right">
                                    <h2 id="q_expire" class=" w3-bottombar ls-border-gray">0</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w3-row w3-col m12">
                        <!-- <h3>Category</h3> -->
                        <div class="tableModel-mini" style="width:100%; overflow:auto; height: 500px">
                            <table  id="table_category"class="w3-tiny w3-table w3-bordered w3-border w3-hoverable w3-white">
                                <thead>
                                    <tr class="header ls-c-bg">
                                        <th>Category</th>
                                        <th>Subcategory</th>
                                        <th>Total</th>
                                        <th>Win</th>
                                        <th>Lost</th>
                                        <th>Expire</th>
                                    </tr>
                                </thead>
                                <tbody name="tbody" >
                                </tbody>
                            </table>
                        </div>
                    <br>
                    </div>
                </div>
            </div>
            <!-- <div class="w3-col m5">
                <div class="w3-card" style="">
                    <div class="w3-container ls-hl w3-padding-16">
                        
                    </div>
                    <br>
                </div>
            </div> -->
        </div>

        <div class="w3-modal" id="modalAlertSLA">
          <div class="w3-modal-content w3-card-4 w3-animate-zoom">
            <header class="w3-container ls-c-bg">
                <h2><span onclick="document.getElementById('modalAlertSLA').style.display='none'"
                class="w3-button w3-display-topright">&times;</span></h2>
                <h2><span id="header_warning">แจ้งเตือน Tickets ใกล้/เกินกำหนด SLA</span></h2>
            </header>
              <div class="tableModel">
                <table id="table_sla" class="w3-small w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
                  <thead>
                    <tr class="header ls-c-bg">
                    <th></th>
                    <th>Ticket No.</th>
                    <th>Created Datetime</th>
                    <th>Recorder</th>
                    <th>SLA</th>
                    <th>Priority</th>
                  </tr>
                  </thead>
                  <tbody></tbody>
                </table>
              </div>
            </div>
            <br>
        </div>

        <div class="w3-modal" id="modalAnnouncement">
          <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="width:1200px">
            <header class="w3-container ls-c-bg">
                <h2><span onclick="document.getElementById('modalAnnouncement').style.display='none'"
                class="w3-button w3-display-topright">&times;</span></h2>
                <h2><span id="header_warning">Announcement</span></h2>
            </header>
              <div class="w3-row w3-container">
                <br>
                <div class="w3-border w3-padding w3-xlarge" id="announcement_title"></div><br>
                <div class="w3-border w3-padding" id="announcement_content"></div>
                <div class="w3-row" >
                    <div class="w3-col m6 w3-padding">
                        <span id="announcement_edited_datetime"></span>
                    </div>
                    <div class="w3-col m6 w3-padding">
                        <span id="announcement_recorder" class="w3-right"></span>
                    </div>
                </div>
              </div>
            </div>
            <br>
        </div>

    </div>
</body>
<script>
    var today = moment();
    $(document).ready(function () {
	    $('#aDashboard').addClass('active');
        $("#month").val(today.format('MM'));

        $('#current_date').html(today.format('DD MMM YYYY'));

        $.post('./delivery/get_delivery.php', { event: 'get_total_shipping' ,month:today.format('YYYY-MM-DD'), next_month:today.format('YYYY-MM-DD') }, function(data){
            console.log('get_total_shipping', data);
            if (data != 'error') {
                $('#shipping_waiting').html(data[0].waiting);
                $('#shipping_inprogress').html(data[0].inprogress);
                $('#shipping_finish').html(data[0].finish);
                $('#shipping_denied').html(data[0].denied);
            }else{
                $('#shipping_waiting').html(0);
                $('#shipping_inprogress').html(0);
                $('#shipping_finish').html(0);
                $('#shipping_denied').html(0);

            }
        }, 'json');

    });

    function callTicketStatus(buttonStatus){
        var start_date;
        var end_date;
		var title = "";

        $('.button-label').css("background-color", "#2196F3");
        switch(buttonStatus){
            case 'jan' : $("#start_date").val(today.format('YYYY')+'-01-01');$("#end_date").val(today.format('YYYY')+'-01-31'); $('#b_Jan').css("background-color", "#094067"); break;
            case 'feb' : $("#start_date").val(today.format('YYYY')+'-02-01');$("#end_date").val(today.format('YYYY')+'-02-28'); $('#b_Feb').css("background-color", "#094067"); break;
            case 'mar' : $("#start_date").val(today.format('YYYY')+'-03-01');$("#end_date").val(today.format('YYYY')+'-03-31'); $('#b_Mar').css("background-color", "#094067"); break;
            case 'apr' : $("#start_date").val(today.format('YYYY')+'-04-01');$("#end_date").val(today.format('YYYY')+'-04-30'); $('#b_Apr').css("background-color", "#094067"); break;
            case 'may' : $("#start_date").val(today.format('YYYY')+'-05-01');$("#end_date").val(today.format('YYYY')+'-05-31'); $('#b_May').css("background-color", "#094067"); break;
            case 'jun' : $("#start_date").val(today.format('YYYY')+'-06-01');$("#end_date").val(today.format('YYYY')+'-06-30'); $('#b_Jun').css("background-color", "#094067"); break;
            case 'jul' : $("#start_date").val(today.format('YYYY')+'-07-01');$("#end_date").val(today.format('YYYY')+'-07-31'); $('#b_Jul').css("background-color", "#094067"); break;
            case 'aug' : $("#start_date").val(today.format('YYYY')+'-08-01');$("#end_date").val(today.format('YYYY')+'-08-31'); $('#b_Aug').css("background-color", "#094067"); break;
            case 'sep' : $("#start_date").val(today.format('YYYY')+'-09-01');$("#end_date").val(today.format('YYYY')+'-09-30'); $('#b_Sep').css("background-color", "#094067"); break;
            case 'oct' : $("#start_date").val(today.format('YYYY')+'-10-01');$("#end_date").val(today.format('YYYY')+'-10-31'); $('#b_Oct').css("background-color", "#094067"); break;
            case 'nov' : $("#start_date").val(today.format('YYYY')+'-11-01');$("#end_date").val(today.format('YYYY')+'-11-30'); $('#b_Nov').css("background-color", "#094067"); break;
            case 'dec' : $("#start_date").val(today.format('YYYY')+'-12-01');$("#end_date").val(today.format('YYYY')+'-12-31'); $('#b_Dec').css("background-color", "#094067"); break;
            case 'all' : $("#start_date").val(today.format('YYYY')+'-01-01');$("#end_date").val(today.format('YYYY')+'-12-31'); $('#b_all').css("background-color", "#094067"); break;

            
        }
        $(this).css("background-color", "yellow");
        getGraph();
    }
    function getGraph(){
        $('#month').get_ticket($("#start_date").val()  , $("#end_date").val());
        $('#month').get_claim($("#start_date").val()  , $("#end_date").val());
        $('#month').get_company_group($("#start_date").val()  , $("#end_date").val(), "Company Group");
        $('#month').get_certificate($("#start_date").val()  , $("#end_date").val(), "Company Group");
        // $('#month').get_technician($("#start_date").val()  , $("#end_date").val());
        // $('#month').get_pm_contract($("#start_date").val()  , $("#end_date").val());
        $('#month').get_job($("#start_date").val()  , $("#end_date").val());
        // $('#month').get_quotation($("#start_date").val()  , $("#end_date").val());
        $('#month').get_status_quotation($("#start_date").val()  , $("#end_date").val());
        $('#month').get_delivery($("#start_date").val()  , $("#end_date").val());
        $('#month').get_announcement();
    }

    $.fn.get_ticket = function(startOfMonth , endOfMonth){
        $.post('./personal/get_graph.php', {
            event:'get_ticket_total',
            start:startOfMonth,
            end:endOfMonth,
            member: localStorage.getItem('member')
        }, function(data){
                console.log('get_ticket_total', data);
            if (data.length >0) {
                var arr_data = [['Date', 'Complete','Pending','Inprogress', 'Cancel' ]];
                var sum_complete = 0;
                var sum_pending = 0;
                var sum_open = 0;
                var sum_close = 0;
                var sum_incident = 0;
                var sum_service = 0;
                var ticks = [];
                $.each( data, function(  index, arr ) {
                ticks.push(new Date(arr.s_date));
                

                    sum_complete += parseInt(arr.s_complete);
                    sum_pending += parseInt(arr.s_pending);
                    sum_open += parseInt(arr.s_open);
                    sum_close += parseInt(arr.s_close);
                    sum_incident += parseInt(arr.s_incident);
                    sum_service += parseInt(arr.s_service);
                    arr_data.push([(moment(arr.s_date).format('D MMM')), parseFloat(arr.s_complete), parseFloat(arr.s_pending), parseFloat(arr.s_open), parseFloat(arr.s_close)]);
                });
                $('#sum_complete').html(sum_complete);
                $('#sum_pending').html(sum_pending);
                $('#sum_open').html(sum_open);
                $('#sum_close').html(sum_close);
                $('#sum_service').html(sum_service);
                $('#sum_incident').html(sum_incident);

                // arr_data.push([((moment(startOfMonth).format('DD MMM YYYY')) ), null, null, null ,null]);
                // arr_data.push([((moment(endOfMonth).format('DD MMM YYYY'))  ), null, null, null ,null]);

                var data = google.visualization.arrayToDataTable(arr_data);
                var options = {
                    title: 'Ticket Service รายเดือน',
                    isStacked: true,
                    bar: { groupWidth: '45%' },
                    hAxis: { format: 'dd MMM',
                    slantedText:true,
                    slantedTextAngle:45, },
                    // ticks: ticks,
                    colors: ["#109618","#ee872b","#097CC0","#adadad"]
                    // colors: ["#59C1BD","#097CC0","#FFE15D","#EB455F","#59C1BD"]
                };

                var chart = new google.visualization.ColumnChart(document.getElementById('chart_ticket'));
                chart.draw(data, options);
                
            }else{
                $("#chart_ticket").html("<h4>Sorry, not info available</h4>");
                $('#sum_complete').html(0);
                $('#sum_pending').html(0);
                $('#sum_open').html(0);
                $('#sum_close').html(0);
            }
            
        }, 'json');

        $.post('./service/get_service.php', { event:"get_over_sla" }, function(data){
            console.log('get_over_sla',data);
            $('#sum_over_sla').html(data.length);
            var tbody = $('#table_sla').find('tbody');
            tbody.empty();
            
            //   if(data.length>0){
            //     $('#modalAlertSLA').show();
            //     // alert("มี Ticket ใกล้หรือเกินกำหนด sla อยู่จำนวน "+ data[0].total +" Tickets ได้แก่ "+ data[0].group_sr);
            //     $.each( data, function( key, value ) {

            //       var color_tag ="";
            //         switch(value.priority){
            //             case 'Critical': color_tag = ' ls-bg-red ';break;
            //             case 'Medium': color_tag = ' ls-bg-orange ';break;
            //             case 'Low': color_tag = ' ls-bg-gray ';break;
            //         }
            //       tbody.append($('<tr>')
            //           .append($('<td>')
            //               .append($('<img>')
            //                   .attr('src', '../img/Icon/edit.png')
            //                   .attr('onclick', "goDetail("+value.id+")")
            //                   .attr('style', 'width:25px; height:25px; cursor:pointer;')))
            //           .append($('<td>')
            //               .html(value.sr))
            //           .append($('<td>')
            //               .html(value.created_datetime))
            //           .append($('<td>')
            //               .html(value.recorder))
            //           // .append($('<td>')
            //           //     .html(value.assigned_name))
            //           .append($('<td>')
            //               .html(value.sla))
            //           .append($('<td>')
            //               .html('<span class="w3-tag w3-padding-small w3-round-large '+color_tag+' w3-center">'+value.priority+'</span>'))
            //       );
            //     });
            //   }
            
        }, 'json');
    };

    $('#btn_over_sla').click(function() {
        $.post('./service/get_service.php', { event:"get_over_sla" }, function(data){
            console.log('get_over_sla',data);
            $('#sum_over_sla').html(data.length);
            var tbody = $('#table_sla').find('tbody');
            tbody.empty();
            
              if(data.length>0){
                $('#modalAlertSLA').show();
                // alert("มี Ticket ใกล้หรือเกินกำหนด sla อยู่จำนวน "+ data[0].total +" Tickets ได้แก่ "+ data[0].group_sr);
                $.each( data, function( key, value ) {

                  var color_tag ="";
                    switch(value.priority){
                        case 'Critical': color_tag = ' ls-bg-red ';break;
                        case 'Medium': color_tag = ' ls-bg-orange ';break;
                        case 'Low': color_tag = ' ls-bg-gray ';break;
                    }
                  tbody.append($('<tr>')
                      .append($('<td>')
                          .append($('<img>')
                              .attr('src', '../img/Icon/edit.png')
                              .attr('onclick', "goDetail("+value.id+")")
                              .attr('style', 'width:25px; height:25px; cursor:pointer;')))
                      .append($('<td>')
                          .html(value.sr))
                      .append($('<td>')
                          .html(value.created_datetime))
                      .append($('<td>')
                          .html(value.recorder))
                      // .append($('<td>')
                      //     .html(value.assigned_name))
                      .append($('<td>')
                          .html(value.sla))
                      .append($('<td>')
                          .html('<span class="w3-tag w3-padding-small w3-round-large '+color_tag+' w3-center">'+value.priority+'</span>'))
                  );
                });
              }
            
        }, 'json');
    });
    $('#btn_announcement').click(function() {
        window.location.href="./index";
        // $(this).get_announcement();
    });
    $('body').keyup(function(event) {
        if (event.keyCode === 13) {
            console.log("close modalAlertSLA");
            $('#modalAlertSLA').hide();
        }
    });

    $.fn.get_claim = function(startOfMonth , endOfMonth){
        $.post('./personal/get_graph.php', {
            event:'get_claim',
            start:startOfMonth,
            end:endOfMonth,
            member: localStorage.getItem('member')
        }, function(data){
                console.log('get_claim', data);
            if (data.length >0) {
                var arr_data = [['Date', 'Complete','Pending','Open', 'Close' ]];
                var sum_complete = 0;
                var sum_pending = 0;
                var sum_open = 0;
                var sum_close = 0;
                var sum_claim = 0;
                var sum_repair = 0;
                var sum_over_sla = 0;
                var sum_in_period = 0;
                $.each( data, function(  index, arr ) {
                    sum_complete += parseInt(arr.s_complete);
                    sum_pending += parseInt(arr.s_pending);
                    sum_open += parseInt(arr.s_open);
                    sum_close += parseInt(arr.s_close);
                    sum_claim += parseInt(arr.s_claim);
                    sum_repair += parseInt(arr.s_repair);
                    sum_over_sla += parseInt(arr.s_over_sla);
                    sum_in_period += parseInt(arr.s_in_period);
                    // arr_data.push([new Date(arr.s_date), parseFloat(arr.s_complete), parseFloat(arr.s_pending), parseFloat(arr.s_open), parseFloat(arr.s_close)]);
                });
                $('#claim_sum_complete').html(sum_complete + sum_close);
                $('#claim_sum_pending').html(sum_pending);
                // $('#claim_sum_open').html(sum_open);
                // $('#claim_sum_close').html(sum_close);
                // $('#claim_sum_repair').html(sum_repair);
                // $('#claim_sum_claim').html(sum_claim);
                $('#claim_sum_over_sla').html(sum_over_sla);
                $('#claim_sum_inprogress').html(sum_in_period);
            }else{
                $('#claim_sum_complete').html(0);
                $('#claim_sum_pending').html(0);
                $('#claim_sum_over_sla').html(0);
                $('#claim_sum_inprogress').html(0);
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
                console.log('get_company_group',data);
            if (data.length >0) {
                var arr_data = [['Group' , 'Service' , 'Incident' ,'Total',{ role: 'annotation' } ]];
                $.each( data, function(  index, arr ) {
                    arr_data.push([(arr.company_group), parseFloat(arr.total_service), parseFloat(arr.total_incident),0, parseFloat(arr.total) ]);
                });
                var data = google.visualization.arrayToDataTable(arr_data);
                var options = {
					// title: title,
                    fontSize : 20,
                    pieSliceText: 'value',
                    isStacked: true,
                    legend: {position: 'top'},
                    // colors: ["#fecf4a","#00A4E4","#3366CC","#ff251b"]
                    colors: ["#4CAF50" ,"#f44336","#00A4E4"],
                };
                var chart = new google.visualization.BarChart(document.getElementById('chart_ticket_company'));
                chart.draw(data, options);
            }else{
                $("#chart_ticket_company").html("<h4>Sorry, not info available</h4>");
            }
        }, 'json');
    };
    $.fn.get_certificate = function(startOfMonth , endOfMonth, title){
		console.log(startOfMonth,endOfMonth);
        $.post('./personal/get_graph.php', {
            event:'get_certificate',
            start:startOfMonth,
            end:endOfMonth,
            member: localStorage.getItem('member')
        }, function(data){
                console.log(data);
            if (data.length >0) {
                var arr_data = [['Type' , 'Total',{ role: 'annotation' } ]];
                $.each( data, function(  index, arr ) {
                    arr_data.push([(arr.certificate_type), parseFloat(arr.total), parseFloat(arr.total)]);
                });
                var data = google.visualization.arrayToDataTable(arr_data);
                var options = {
					title: title,
                    fontSize : 20,
                    pieSliceText: 'value',
                    legend: {position: 'none'},
                    isStacked: true,
                    bar: { groupWidth: '95%' },
                    colors: ["#6b53c1"],
                };
                var chart = new google.visualization.ColumnChart(document.getElementById('chart_certificate'));
                chart.draw(data, options);
            }else{
                $("#chart_certificate").html("<h4>Sorry, not info available</h4>");
            }
        }, 'json');
    };
    $.fn.get_announcement = function(){
        $.post('./personal/get_graph.php', {
            event:'get_announcement',
            member: localStorage.getItem('member')
        }, function(data){
            console.log(data);
            var div_announcement = $('#div_announcement');
            div_announcement.empty();
            $.each(data,function (key, value) {
                var color = "w3-teal";
                switch(value.type){
                    case 'News': color = "w3-red"; break;
                    case 'Warning': color = "w3-blue"; break;
                    case 'Update': color = "w3-green"; break;
                }
                div_announcement.append('<div class="w3-bar-item w3-button view_announcement" data-color="'+color+'" data-id="'+value.id+'" >'
                    // +'<div class="w3-col m2">'
                    //     +'<span class="w3-tag '+color+' w3-small">'+value.type+'</span>'
                    // +'</div>'
                    +'<div class="w3-col m10">'
                        +'<span class="w3-medium">'+value.title+'</span>'+' <span class="w3-tag '+color+' w3-small">'+value.type+'</span>'
                    +'</div>'
                    +'<div class="w3-col m2 w3-right w3-small w3-text-indigo"><span class="w3-right">'
                        +moment(value.edited_datetime).format("DD/MM/YYYY")
                    +'</span></div>'
                        +'<div class="w3-col m2 w3-right w3-small w3-text-grey"><span class="w3-right">'
                        +value.recorder
                    +'</span></div>'
                +'</div>');
            });
            $(".view_announcement").click(function(){
                var announcement_id = $(this).data('id');
                var color = $(this).data('color');
                $.post('./personal/get_graph.php', {
                    event:'get_announcement_by_id',
                    announcement_id: announcement_id,
                    member: localStorage.getItem('member')
                }, function(data){
                    console.log('get_announcement_by_id',data);

                    $('#modalAnnouncement').show();
                    $('#announcement_title').html('<span class="w3-tag '+color+' w3-xlarge">'+data[0].type+'</span> '+ data[0].title );
                    $('#announcement_content').html(data[0].content);
                    $('#announcement_recorder').html(data[0].recorder);
                    $('#announcement_edited_datetime').html(data[0].edited_datetime);
                    
                }, 'json');

            });
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
    $.fn.get_job = function(startOfMonth , endOfMonth){
        
        $.post('./personal/get_graph.php', {
            event:'get_job',
            start:moment().format('YYYY')+'-01-01',
            end:moment().format('YYYY')+'12-31',
            // start:startOfMonth,
            // end:endOfMonth,
            member: localStorage.getItem('member')
        }, function(data){
                console.log('get_job',data);
            if (data.length >0) {
                    var arr_data = [];
                    data.forEach((arr, index_a) => {
                        arr_data.push([new Date(arr.s_date), parseFloat(arr.total)]);
                    });
                    var dataTable = new google.visualization.DataTable();
                    dataTable.addColumn({ type: 'date', id: 'Date' });
                    dataTable.addColumn({ type: 'number', id: 'Total' });
                    dataTable.addRows(arr_data);
                    var chart = new google.visualization.Calendar(document.getElementById('chart_job'));

                    var options = {
                        title: 'Job' ,
                        responsive: true,
                        height: 300,
                        colorAxis: {
                            colors: ['#faf0e6','#dc3912'],
                            values: [1,10]
                        },
                        // calendar: {
                        //     cellSize: 25,
                        // }
                        calendar: {
                            cellSize: 25,
                            monthLabel: {
                                fontName: 'Times-Roman',
                                fontSize: 24,
                                // color: 'green',
                                bold: true,
                                italic: false
                            },
                        }
                    };
                    chart.draw(dataTable, options);
            }else{
                $("#chart_job").html("<h4>Sorry, not info available</h4>");
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

                arr_data.push([new Date(startOfMonth), null, null]);
                arr_data.push([new Date(endOfMonth), null, null]);

                var data = google.visualization.arrayToDataTable(arr_data);
                var options = {
                    title: 'Quotation รายเดือน',
                    isStacked: true,
                    bar: { groupWidth: '85%' },
                    colors: ["#59C1BD","#097CC0","#FFE15D","#EB455F","#59C1BD"]
                };

                var chart = new google.visualization.ColumnChart(document.getElementById('chart_quotation'));
                chart.draw(data, options);
            }else{
                $("#chart_quotation").html("<h4>Sorry, not info available</h4>");
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
                console.log('get_status_quotation',data);
                var s_win = 0;
                var s_lost = 0;
                var s_propose = 0;
                var s_quotation = 0;
                var s_final_quotation = 0;
                var s_expire = 0;
            if (data.length >0) {
                var arr_data = [['Date', '100% WIN', 'Lost','30% Propose','50% Pipeline','80% Final Quote','Expire']];
                
                $.each( data, function( index, arr ) {
                    s_win += parseInt(arr.s_win);
                    s_lost += parseInt(arr.s_lost);
                    s_propose += parseInt(arr.s_propose);
                    s_quotation += parseInt(arr.s_quotation);
                    s_final_quotation += parseInt(arr.s_final_quotation);
                    s_expire += parseInt(arr.s_expire);
                    arr_data.push([new Date(arr.s_date), parseFloat(arr.s_win), parseFloat(arr.s_lost), parseFloat(arr.s_propose), parseFloat(arr.s_quotation), parseFloat(arr.s_final_quotation), parseFloat(arr.s_expire)]);
                });
        
                
                $('#q_win').html(s_win);
                $('#q_inprogress').html(s_propose + s_quotation + s_final_quotation);
                $('#q_lost').html(s_lost);
                $('#q_expire').html(s_expire);

                arr_data.push([new Date(startOfMonth), null, null, null, null, null, null]);
                arr_data.push([new Date(endOfMonth), null, null, null, null, null, null]);

                var data = google.visualization.arrayToDataTable(arr_data);
                var options = {
                    isStacked: true,
                    bar: { groupWidth: '85%' },
                    colors: ["#91C483","#EB455F","#bfd1ea","#097CC0","#FFC600","#6b53c1"]
                };

                var chart = new google.visualization.SteppedAreaChart(document.getElementById('chart_status_quotation'));
                chart.draw(data, options);
            }else{
                $("#chart_status_quotation").html("<h4>Sorry, not info available</h4>");
                $('#q_win').html(0);
                $('#q_inprogress').html(0);
                $('#q_lost').html(0);
                $('#q_expire').html(0);
            }
        }, 'json');

        $.post('./personal/get_graph.php', {
            event:'graph_category',
            user:'admin',
            start_date:startOfMonth,
            end_date:endOfMonth,
            validity:'Expired',
        }, function(data){
                console.log('graph_category',data);
                var tbody = $('#table_category').find('tbody');
                tbody.empty();
                var txt_category = "";
                var html_category = "";
                $.each(data,function (key, value) {
                    if(txt_category == value.category){
                        html_category = "";
                    }else{
                        txt_category = value.category;
                        html_category = '<b>'+value.category+'</b>';
                    }
                    tbody.append($('<tr >')
                        .append($('<td>')
                            .addClass('w3-center w3-large ')
                            .html(html_category))
                        .append($('<td>')
                            .addClass('w3-center')
                            .html(value.subcategory))
                        .append($('<td>')
                            .addClass('w3-center')
                            .html(value.total))
                        .append($('<td>')
                            .addClass('w3-center w3-green w3-opacity')
                            .html(value.s_win))
                        .append($('<td>')
                            .addClass('w3-center w3-red w3-opacity')
                            .html(value.s_lost))
                        .append($('<td>')
                            .addClass('w3-center w3-gray')
                            .html(value.s_expire))
                    );
                });
        }, 'json');
    };
    $.fn.get_delivery = function(startOfMonth , endOfMonth){

        $.post('./personal/get_graph.php', {
            event:'get_delivery',
            start:startOfMonth,
            end:endOfMonth,
            member: localStorage.getItem('member')
        }, function(data){
                console.log('get_delivery',data);
            if (data.length >0) {
                var arr_data = [['Date', 'Internal','External','Walk In']];
                $.each( data, function( index, arr ) {
                    arr_data.push([ (moment(arr.s_date).format('D MMM')), parseFloat(arr.s_internal), parseFloat(arr.s_external), parseFloat(arr.s_walk_in)]);
                });
        
                // arr_data.push([new Date(startOfMonth), null, null, null]);
                // arr_data.push([new Date(endOfMonth), null, null, null]);

                var data = google.visualization.arrayToDataTable(arr_data);
                var options = {
                    // title: 'Delivery',
                    isStacked: true,
                    colors: ["#097CC0","#EB455F","#59C1BD","#FFE15D","#B799FF","#A2FF86","#59C1BD"],
                    hAxis: { format: 'dd MMM',
                    slantedText:true,
                    slantedTextAngle:45, },
                };

                var chart = new google.visualization.LineChart(document.getElementById('chart_delivery'));
                chart.draw(data, options);
            }else{
                $("#chart_delivery").html("<h4>Sorry, not info available</h4>");
            }
        }, 'json');
    };
//////////
    google.charts.load('current', {packages: ['corechart', 'line','calendar']});

    setTimeout(
    function() 
    {
        $('#b_'+moment().format('MMM')).click();
    }, 1000);

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