<?php
  include 'database.php';
  include 'logininfo.php';
  $SERVER_NAME =  $_SERVER['SERVER_NAME']; 

  $username = $_COOKIE['username'];
  $sqluser = "SELECT * FROM `user` WHERE `username` = '$username'";
  $resultSqluser = $conn->query($sqluser);
  	if ($resultSqluser->num_rows > 0) {
		if($row = $resultSqluser->fetch_assoc()) {
			$userType = $row['type'];
		}
	}
?>
<style>
:root {

    --Card_background: #097CC0;
    --Card_headline:#fffffe;
    --Card_paragraph: #d8eefe;
    --Headline: #094067;
    --green: #109618;
    --red: #dc3912;
    /* --test: #ed4d77; */
    --purple: #6b53c1;
    --yellow: #FFC600;
    --orange:#ee872b;
    --gray: #adadad;
    --blue: #097CC0;
    --dark_blue: #3759c1;
    --mint: #0db790;
    --pink: #faf0e6;
}
.ls-c-bg {
    color: var(--Card_paragraph)!important;
    background-color: var(--Card_background)!important;
}
.w3-bar-block a.active {
  /* background-color: #04AA6D; */
  color: #1e1e1e;
}

.ls-border-c {
    border: 1px solid var(--Card_background)!important;
}
.ls-head {
    color: var(--Headline)!important;
}


.ls-bg-red{background-color: var(--red)!important;color: white!important;}
.ls-bg-green{background-color: var(--green)!important;color: white!important;}
.ls-bg-orange{background-color: var(--orange)!important;color: white!important;}
.ls-bg-blue{background-color: var(--blue)!important;color: white!important;}
.ls-bg-gray{background-color: var(--gray)!important;color: white!important;}
.ls-bg-purple{background-color: var(--purple)!important;color: white!important;}
.ls-bg-mint{background-color: var(--mint)!important;color: white!important;}
.ls-bg-yellow{background-color: var(--yellow)!important;color: white!important;}

.ls-red{color: var(--red)!important;}
.ls-green{color: var(--green)!important;}
.ls-orange{color: var(--orange)!important;}
.ls-blue{color: var(--blue)!important;}
.ls-gray{color: var(--gray)!important;}
.ls-mint{color: var(--mint)!important;}
.ls-purple{color: var(--purple)!important;}
.ls-yellow{color: var(--yellow)!important;}

.ls-b-red{border: 1px solid var(--red)!important;}
.ls-b-green{border: 1px solid var(--green)!important;}
.ls-b-orange{border: 1px solid var(--orange)!important;}
.ls-b-blue{border: 1px solid var(--blue)!important;}
.ls-b-gray{border: 1px solid var(--gray)!important;}
.ls-b-mint{border: 1px solid var(--mint)!important;}
.ls-b-purple{border: 1px solid var(--purple)!important;}
.ls-b-yellow{border: 1px solid var(--yellow)!important;}

.ls-round{border-radius:4px}



.main_responsive {
  margin-left: 200px; /* Same as the width of the sidenav */
}
@media (max-width:992px){.w3-sidebar.w3-collapse{display:none}.main_responsive{margin-left:0!important;margin-right:0!important}.w3-auto{max-width:100%}}
</style>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">   -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<!-- <script src="/other/js/ckeditor_12.3.1.js"></script> -->
<script src="/myplugins/ckeditor.js"></script>
<!-- <script src="/myplugins/jquery-ui.js"></script>
<script src="/myplugins/jquery-ui.css"></script> -->

<!-- <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.2/ckeditor5.css"> -->
<!-- <link rel="stylesheet" href="/style.css"> -->
<link href="https://fonts.googleapis.com/css?family=Sarabun&;display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>

    <div class="w3-bar w3-top ls-c-bg w3-large" style="z-index:4">
        <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey "
            onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
        <span id="member" class="w3-bar-item w3-left w3-hide-medium w3-hide-small"></span>
        <span id="user_name" class="w3-bar-item w3-right "></span>
    </div>
    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-collapse ls-c-bg w3-animate-left" style="z-index:3;width:200px;" id="mySidebar">
        <div class="w3-container">
            <h5>Linkservice</h5>
            <!-- <img src="/img/wtclogo-white.png" width="130"> -->
        </div>
        <div class="w3-bar-block">
            <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-pale-grey w3-hover-blue" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>

            <a id="aDashboard" href="/dashboard" class="aDashboard w3-bar-item w3-button" style="align-items: center;"><i class="w3-large fa fa-th-large" aria-hidden="true"></i>&nbsp; Dashboard</a>
			<!-- <a id="aNotify" href="/notify" class="aNotify w3-bar-item w3-button" style="align-items: center;"><i class="w3-large fa fa-briefcase" aria-hidden="true"></i>&nbsp; Service Tickets</a> -->
			<a id="aNotify" class="aNotify w3-button w3-block w3-left-align" onclick="myAccFunc()"><i class="w3-large fa fa-briefcase" aria-hidden="true"></i>&nbsp; Help Desk</a>
				<div id="demoAcc" class="w3-bar-block w3-hide w3-white w3-card-4">
					<a id="aNotify" href="/service" class="aNotify w3-bar-item w3-button" style="align-items: center;">Tickets</a>
					<a id="aNotify" href="/claim_repair" class="aNotify w3-bar-item w3-button" style="align-items: center;">Claim & Repair</a>
				</div>
                
            <!-- <a id="aWarranty" href="/warranty" class="aWarranty w3-bar-item w3-button" style="align-items: center;"><i class="w3-large fa fa-shield" aria-hidden="true"></i>&nbsp; MA Contract</a>
            <a id="aImplement" href="/implement" class="aImplement w3-bar-item w3-button" style="align-items: center;"><i class="w3-large fa fa-cogs" aria-hidden="true"></i>&nbsp; Implement</a> -->
            <a id="aProject" class="aProject w3-button w3-block w3-left-align" onclick="myProjectFunc()"><i class="w3-large fa fa-bookmark" aria-hidden="true"></i>&nbsp; Service</a>
            <!-- <a id="aProject" href="/project" class="aProject w3-bar-item w3-button" style="align-items: center;"><i class="w3-large fa fa-bookmark" aria-hidden="true"></i>&nbsp; Project</a> -->
                <div id="ProjectAcc" class="w3-bar-block w3-hide w3-white w3-card-4">
					<a id="aProject" href="/project" class="aProject w3-bar-item w3-button" style="align-items: center;">Project</a>
					<a id="aProject" href="/project/implement" class="aProject w3-bar-item w3-button" style="align-items: center;">Project Dashboard</a>
					<a id="aProject" href="/ma_service" class="aProject w3-bar-item w3-button" style="align-items: center;">MA Contract</a>
					<!-- <a id="aProject" href="/project/preventive" class="aProject w3-bar-item w3-button" style="align-items: center;">Preventive</a> -->
				</div>
            <a id="aWarranty" href="/warranty_item" class="aWarranty w3-bar-item w3-button" style="align-items: center;"><i class="w3-large fa fa-link" aria-hidden="true"></i>&nbsp; Warranty</a>
            <a id="aCP" href="/integrate" class="aCP w3-bar-item w3-button" style="align-items: center;"><i class="w3-large fa fa-keyboard-o" aria-hidden="true"></i>&nbsp; CP</a>
            <a id="aPurchase" href="/purchase" class="aPurchase w3-bar-item w3-button" style="align-items: center;"><i class="w3-large fa fa-shopping-cart" aria-hidden="true"></i>&nbsp; Purchase</a>
            <a id="aStock" href="/stock" class="aStock w3-bar-item w3-button" style="align-items: center;"><i class="w3-large fa fa-cubes" aria-hidden="true"></i>&nbsp; Stock</a>
            <a id="aRequest" href="/request" class="aRequest w3-bar-item w3-button" style="align-items: center;"><i class="w3-large fa fa-cube" aria-hidden="true"></i>&nbsp; Request</a>
            <a id="aLeadassign" href="/leadassign" class="aLeadassign w3-bar-item w3-button" style="align-items: center;"><i class="w3-large fa fa-envelope-o" aria-hidden="true"></i>&nbsp; Lead & Pipeline</a>
            <a id="aQuotation" href="/quotation_new" class="aQuotation w3-bar-item w3-button" style="align-items: center;"><i class="w3-large fa fa-file-text" aria-hidden="true"></i>&nbsp; Sale</a>
            <a id="aCertificate" href="/certificate" class="aCertificate w3-bar-item w3-button" style="align-items: center;"><i class="w3-large fa fa-certificate" aria-hidden="true"></i>&nbsp; Certificate</a>
            <a id="aDelivery" href="/delivery" class="aDelivery w3-bar-item w3-button" style="align-items: center;"><i class="w3-large fa fa-truck" aria-hidden="true"></i>&nbsp; Delivery</a>
            <a id="aLeave" href="/leave" class="aLeave w3-bar-item w3-button" style="align-items: center;"><i class="w3-large fa fa-hand-paper-o" aria-hidden="true"></i>&nbsp; Leave Request</a>
            <a id="aDocument" href="/document" class="aDocument w3-bar-item w3-button" style="align-items: center;"><i class="w3-large fa fa-book" aria-hidden="true"></i>&nbsp; Document</a>
            <a id="aAnnouncement" href="/announcement" class="aAnnouncement w3-bar-item w3-button" style="align-items: center;"><i class="w3-large fa fa-bullhorn" aria-hidden="true"></i>&nbsp; Announcement</a>
            <a id="aTechnician" href="/job" class="aTechnician w3-bar-item w3-button" style="align-items: center;"><i class="w3-large fa fa-wrench" aria-hidden="true"></i>&nbsp; Job</a>
            <a id="aUser" href="/user" class="aUser w3-bar-item w3-button" style="align-items: center;"><i class="w3-large fa fa-user" aria-hidden="true"></i>&nbsp; User</a>
            <a id="aMeeting" class="aMeeting w3-bar-item w3-button" style="align-items: center;"><i class="w3-large fa fa-comments" aria-hidden="true"></i>&nbsp; Meeting</a>
            <a id="aProfile" href="/profile" class="aProfile w3-bar-item w3-button" style="align-items: center;"><i class="w3-large fa fa-id-card-o" aria-hidden="true"></i>&nbsp; Profile</a>
            <a id="aLogout" href="/logout" class="aLogout w3-bar-item w3-button" style="align-items: center;"><i class="w3-large fa fa-sign-out" aria-hidden="true"></i>&nbsp; Logout</a>
        </div>
    </nav>
    
    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
<script>
    var mySidebar = document.getElementById("mySidebar");
    var overlayBg = document.getElementById("myOverlay");
    function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
    }
    function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
    }
	$(document).ready(function() {
            $('#user_name').html("["+localStorage.getItem("type").toUpperCase() + "] "+ localStorage.getItem("fname") +" "+localStorage.getItem("lname"));
            $('#member').html(localStorage.getItem("member"));

            $('#aDashboard').css('display', 'flex');
			$('#aUser').hide();
			$('#aQuotation').hide();
			$('#aCertificate').hide();
			$('#aDelivery').hide();
			$('#aNotify').hide();
			$('#aWarranty').hide();
			$('#aPurchase').hide();
			$('#aStock').hide();
			$('#aRequest').hide();
			$('#aLeadassign').hide();
			$('#aImplement').hide();
			$('#aLeave').hide();
			$('#aDocument').hide();
			$('#aTechnician').hide();
      $('#aMeeting').hide();
        $('#aProfile').css('display', 'flex');
			
			var username =localStorage.getItem("username");
			var role =localStorage.getItem("role");
			var type =localStorage.getItem("type");
			var permission =localStorage.getItem("permission");
			var type_id =localStorage.getItem("type_id");
			console.log(type, type_id, permission);

            ////TEST FOR SUB PERMISSION
            var categories = [
                {permission:"Notify", authority: ["Delete","Create"]},
                {permission:"Warranty", authority: ["Update","Create"]},
                {permission:"Purchase", authority: ["Update","Create"]},
            ];
            var categoriesJson = JSON.stringify(categories);
            var Notify = "Notify";
            console.log('categoriesJson',categoriesJson);
            $.each(JSON.parse(categoriesJson) , function (key, value) {
                if(Notify.indexOf(value.permission) > -1){
                    console.log('Exists: ' +value.permission)
                    console.log('authority inArray', $.inArray('Delete',value.authority ));
                }else{
                    // console.log('Does not exists: ' +value.Role)
                }
            });
            ///END //TEST FOR SUB PERMISSION
		if(localStorage.getItem("permission") == ""){
			localStorage.setItem("permission",JSON.stringify([]));
		}
		$.each( JSON.parse(localStorage.getItem("permission")) , function(  index, arr ) {
			$('#a'+arr).css('display', 'flex');
		});


        // aMeeting window.location.href = "./iframe?fname="+localStorage.getItem('fname')+"&lname="+localStorage.getItem('lname');
        $('#aMeeting').click(function() {
            window.location.href = "/meeting/iframe?fname="+localStorage.getItem('fname')+"&lname="+localStorage.getItem('lname');
        });
	});
	function myAccFunc() {
	  var x = document.getElementById("demoAcc");
	  if (x.className.indexOf("w3-show") == -1) {
		x.className += " w3-show";
		x.previousElementSibling.className += " active";
	  } else { 
		x.className = x.className.replace(" w3-show", "");
		x.previousElementSibling.className = 
		x.previousElementSibling.className.replace(" active", "");
	  }
	}
	function myProjectFunc() {
	  var x = document.getElementById("ProjectAcc");
	  if (x.className.indexOf("w3-show") == -1) {
		x.className += " w3-show";
		x.previousElementSibling.className += " active";
	  } else { 
		x.className = x.className.replace(" w3-show", "");
		x.previousElementSibling.className = 
		x.previousElementSibling.className.replace(" active", "");
	  }
	}
	function myWarrantyFunc() {
	  var x = document.getElementById("demoWarranty");
	  if (x.className.indexOf("w3-show") == -1) {
		x.className += " w3-show";
		x.previousElementSibling.className += " active";
	  } else { 
		x.className = x.className.replace(" w3-show", "");
		x.previousElementSibling.className = 
		x.previousElementSibling.className.replace(" active", "");
	  }
	}

	function checkAuth(page){
		$('.a'+page).addClass('active');

		if($.inArray(page,JSON.parse(localStorage.getItem("permission")) ) == -1){
			window.location.href="/";
		}

	}

</script>
</body>
</html>