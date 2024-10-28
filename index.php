
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
                    <span class=" ls-head w3-xxlarge"> Announcement </span>
                </b></h5>
            </div>
        </header>

        <div class="w3-row">
            <div id="announcement_list"></div>
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
    $.post('./html_announcement.php', {event:'get_announcement'
        ,user_id:localStorage.getItem('id')
        , member: localStorage.getItem('member')}, function(data){
        if (data != 'error') {
            $('#announcement_list').html(data);
        }
    }, 'html');
    


</script>

</html>