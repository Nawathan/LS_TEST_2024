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
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<link rel="stylesheet" href="/style.css">
<link href="https://fonts.googleapis.com/css?family=Sarabun&;display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>

.sidenav {
  height: 100%;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #097CC0;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: #f1f1f1;
  display: block;
}


.sidenav a i{
    width: 30px;
    height:30px;
}

.sidenav a.active {
  /* background-color: #04AA6D; */
  color: #1e1e1e;
}


.sidenav a:hover {
  color: #1e1e1e;
}

.main_new {
  margin-left: 200px; /* Same as the width of the sidenav */
  font-size: 28px; /* Increased text to enable scrolling */
  /* padding: 0px 10px; */
  padding: 1px 30px 30px 30px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}



.float-user {
	position:fixed;
	top:0px;
	right:0px;
	text-align:center;
}
</style>
</head>
<body>

<div class="sidenav">
    <span style="display:flex; padding:0px; flex-direction:column;">
	  <div style="align-self:center;">
			<img src="/img/wtclogo-white.png" width="130">
	  </div>
		<p style="color: #f1f1f1; font-size: 12px;align-self:center;">Service Management System</p>
	</span>
  <a id="aDashboard" href="/index"><i class="fa fa-th-large" aria-hidden="true"></i> Dashboard</a>
  <a id="aNotify" href="/notify"><i class="fa fa-briefcase" aria-hidden="true"></i> Service Tickets</a>
  <a id="aWarranty" href="/warranty"><i class="fa fa-shield" aria-hidden="true"></i> MA Contract</a>
  <a id="aPurchase" href="/purchase"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Purchase</a>
  <a id="aStock" href="/stock"><i class="fa fa-cubes" aria-hidden="true"></i> Stock</a>
  <a id="aWithdrawal" href="/request"><i class="fa fa-cube" aria-hidden="true"></i> Request</a>
  <a id="aLeadAssign" href="/leadassign"><i class="fa fa-envelope-o" aria-hidden="true"></i> Lead & Assign</a>
  <!-- <a id="aQuotation" href="/quotation"><i class="fa fa-file-text" aria-hidden="true"></i> Quotation</a> -->
  <a id="aQuotationNew" href="/quotation_new"><i class="fa fa-file-text" aria-hidden="true"></i> Quotation</a>
  <a id="aDelivery" href="/delivery"><i class="fa fa-truck" aria-hidden="true"></i> Delivery</a>
  <a id="aUser" href="/user"><i class="fa fa-user" aria-hidden="true"></i> User</a>
  <a id="aLogout" href="/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
</div>

<!-- <div class="main">
</div> -->
<div class="w3-tag w3-medium w3-padding float-user" id="tag_user">Username</div>
</body>


<script>
	$(document).ready(function() {
            $('#aDashboard').css('display', 'flex');
			$('#aUser').hide();
			// $('#aQuotation').hide();
			$('#aQuotationNew').hide();
			$('#aDelivery').hide();
			$('#aNotify').hide();
			$('#aWarranty').hide();
			$('#aPurchase').hide();
			$('#aStock').hide();
			$('#aWithdrawal').hide();
			$('#aLeadAssign').hide();

			var username =localStorage.getItem("username");
			var role =localStorage.getItem("role");
			var type =localStorage.getItem("type");
			$('#tag_user').html( "["+localStorage.getItem("type").toUpperCase() + "] "+ localStorage.getItem("fname") +" "+localStorage.getItem("lname"));
			console.log('type===',type);
			// admin		- w3-red
			// CEO			- w3-pink
			// helpdesk		- w3-purple
			// purchase		- w3-brown
			// sale			- w3-teal
			// admin_sale	- w3-lime
			// stock		- w3-blue
			// hr			- w3-khaki
			// stock		- w3-yellow
			// delivery		- w3-cyan
			// network		- w3-deep-purple
			// engineer		- w3-indigo
			// data_admin	- w3-amber

		if(type == 'admin' || type == 'CEO'){  $('#tag_user').addClass('w3-red');
			$('#aUser').css('display', 'flex');
			// $('#aQuotation').css('display', 'flex');
			$('#aQuotationNew').css('display', 'flex');
			$('#aDelivery').css('display', 'flex');
			$('#aNotify').css('display', 'flex');
			$('#aWarranty').css('display', 'flex');
			$('#aPurchase').css('display', 'flex');
			$('#aStock').css('display', 'flex');
			$('#aWithdrawal').css('display', 'flex'); 
			$('#aLeadAssign').css('display', 'flex');
		}else if(type == 'helpdesk' ){ $('#tag_user').addClass('w3-purple');
			$('#aNotify').css('display', 'flex');
			$('#aWarranty').css('display', 'flex');
			$('#aStock').css('display', 'flex');
			$('#aWithdrawal').css('display', 'flex'); 
			$('#aQuotationNew').css('display', 'flex');
			$('#aDelivery').css('display', 'flex');
		}else if(type == 'purchase'){  $('#tag_user').addClass('w3-brown');
			$('#aPurchase').css('display', 'flex');
			$('#aStock').css('display', 'flex');
			$('#aWithdrawal').css('display', 'flex'); 
			$('#aDelivery').css('display', 'flex');
		}else if(type == 'sale'){ $('#tag_user').addClass('w3-teal');
			// $('#aQuotation').css('display', 'flex');
			$('#aNotify').css('display', 'flex');
			$('#aWarranty').css('display', 'flex');
			$('#aStock').css('display', 'flex');
			$('#aWithdrawal').css('display', 'flex'); 
			$('#aQuotationNew').css('display', 'flex');
			$('#aDelivery').css('display', 'flex');
		}else if(type == 'admin_sale'){  $('#tag_user').addClass('w3-lime');
			// $('#aQuotation').css('display', 'flex');
			$('#aNotify').css('display', 'flex');
			$('#aWarranty').css('display', 'flex');
			$('#aStock').css('display', 'flex');
			$('#aWithdrawal').css('display', 'flex'); 
			$('#aQuotationNew').css('display', 'flex');
			$('#aDelivery').css('display', 'flex');
			$('#aLeadAssign').css('display', 'flex');
		}else if(type == 'stock'){  $('#tag_user').addClass('w3-blue');
			$('#aDelivery').css('display', 'flex');
			$('#aStock').css('display', 'flex');
			$('#aWithdrawal').css('display', 'flex');
			$('#aDelivery').css('display', 'flex');
		}else if(type == 'hr'){  $('#tag_user').addClass('w3-khaki');
			$('#aWithdrawal').css('display', 'flex');
		}else if(type == 'delivery'){  $('#tag_user').addClass('w3-cyan');
			$('#aDelivery').css('display', 'flex');
			$('#aStock').css('display', 'flex');
		// }else if(type == 'network' ){
		// 	$('#aNotify').css('display', 'flex');
		// 	$('#aWarranty').css('display', 'flex');
		}else if(type == 'network' ){  $('#tag_user').addClass('w3-deep-purple');
			$('#aNotify').css('display', 'flex');
			$('#aWarranty').css('display', 'flex');
			$('#aStock').css('display', 'flex');
			$('#aWithdrawal').css('display', 'flex'); 
			$('#aDelivery').css('display', 'flex');
		}else if(type == 'engineer' ){  $('#tag_user').addClass('w3-indigo');
			$('#aNotify').css('display', 'flex');
			$('#aWarranty').css('display', 'flex');
			$('#aStock').css('display', 'flex');
			$('#aWithdrawal').css('display', 'flex'); 
			$('#aDelivery').css('display', 'flex');
		}else if(type == 'data_admin' ){  $('#tag_user').addClass('w3-ember');
			$('#aNotify').css('display', 'flex');
			$('#aWarranty').css('display', 'flex');
			// $('#aQuotation').css('display', 'flex');
			$('#aQuotationNew').css('display', 'flex');
		}
	});
</script>
</html> 
