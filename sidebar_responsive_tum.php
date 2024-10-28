<?php
include 'database.php';
include 'logininfo.php';
$SERVER_NAME =  $_SERVER['SERVER_NAME'];

$username = $_COOKIE['username'];
$sqluser = "SELECT * FROM `user` WHERE `username` = '$username'";
$resultSqluser = $conn->query($sqluser);
if ($resultSqluser->num_rows > 0) {
  if ($row = $resultSqluser->fetch_assoc()) {
    $userType = $row['type'];
  }
}
?>
<style>
  :root {

    --Card_background: #3759C0;
    --Card_headline: #fffffe;
    --Card_paragraph: #d8eefe;
    --Headline: #094067;
    --green: #109618;
    --red: #dc3912;
    /* --test: #ed4d77; */
    --purple: #6b53c1;
    --yellow: #FFC600;
    --orange: #ee872b;
    --gray: #adadad;
    --blue: #3759C0;
    --dark_blue: #3759C0;
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
    .w3-auto {
      max-width: 100%
    }
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
<!-- <link rel="stylesheet" href="/style.css"> -->
<link href="https://fonts.googleapis.com/css?family=Sarabun&;display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <!-- General CSS Files -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="../tum/dist/assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../tum/dist/assets/modules/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../tum/dist/assets/modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="../tum/dist/assets/modules/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="../tum/dist/assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="../tum/dist/assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="../tum/dist/assets/css/style.css">
  <link rel="stylesheet" href="../tum/dist/assets/css/components.css">

  <link rel="stylesheet" href="../tum/dist/assets/css/tb.min.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../tum/dist/assets/css/calendar.css">
  <link rel="stylesheet" href="../tum/dist/assets/css/btt.css">

  
  <!-- Start GA -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-94034622-3');
  </script>
  <!-- /END GA -->

  <style>
    .bottomleft {
      position: absolute;
      bottom: 8px;
      width: 100%;
    }

    .b4 {
      font-weight: bold;
    }
  </style>

  <link rel="stylesheet" href="../tum/dist/assets/modules/fullcalendar/fullcalendar.css">
  <link rel="stylesheet" href="../tum/dist/assets/modules/fullcalendar/fullcalendar.min.css">

</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li><a href="#" class="nav-link nav-link-lg nav-link-user">
              <span id="user_name" class="w3-bar-item w3-right " style="font-size: 13px;"></span></a>
          </li>
        </ul>
      </nav>

      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="#"><img src="../tum/dist/assets/img/WTC_logo.png" alt="#WTC" style="width: 130px; height: 60px;"></a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="#"><img src="../tum/dist/assets/img/WTC_logo.png" alt="#WTC" style="width: 60px; height: 30px;"></a>
          </div>
          <ul class="sidebar-menu">
            <li class="dropdown ">
              <a id="aDashboard" href="/tum_index_db" class="nav-link b4"><i class="fas fa-chart-pie"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown">
              <a id="aNotify" href="#" class="nav-link has-dropdown b4" data-toggle="dropdown"><i class="fas fa-briefcase"></i><span>Serivce</span></a>
              <ul class="dropdown-menu">
                <li><a id="aNotify" class="nav-link b4" href="/service/tum_index">Tickets</a></li>
                <li><a id="aNotify" class="nav-link b4" href="/claim_repair/tum_index">Claim&Repair</a></li>
              </ul>
            </li>
            <!-- <li class="dropdown">
              <a id="aWarranty" href="/warranty/tum_index" class="nav-link b4"><i class="	fas fa-shield-alt"></i> <span>MA Contract</span></a>
            </li>
            <li class="dropdown">
              <a id="aImplement" href="/implement/tum_index" class="nav-link b4"><i class="	fas fa-cogs"></i> <span>Implement</span></a>
            </li> -->
            <li class="dropdown">
            <a id="aProject" href="/project/tum_index" class="nav-link b4"><i class="fas fa-bookmark"></i><span>Project</span></a>
            </li>
            <li class="dropdown">
            <a id="aWarranty" href="/warranty_item/tum_index" class="nav-link b4"><i class="fas fa-link"></i><span>Warranty</span></a>
            </li>
            <li class="dropdown">
              <a id="aPurchase" href="/purchase/tum_index" class="nav-link b4"><i class="fas fa-shopping-cart"></i> <span>Purchase</span></a>
            </li>
            <li class="dropdown">
              <a id="aStock" href="/stock/tum_index" class="nav-link b4"><i class="	fas fa-cubes"></i> <span>Stock</span></a>
            </li>
            <li class="dropdown">
              <a id="aRequest" href="/request/tum_index" class="nav-link b4"><i class="fas fa-cube"></i> <span>Request</span></a>
            </li>
            <li class="dropdown">
              <a id="aLeadassign" href="/leadassign/tum_index" class="nav-link b4"><i class="fas fa-envelope"></i> <span>Lead & Pipeline</span></a>
            </li>
            <li class="dropdown">
              <a id="aQuotation" href="/quotation_new/tum_index" class="nav-link b4"><i class="far fa-file-alt"></i> <span>Sale</span></a>
            </li>
            <li class="dropdown">
              <a id="aCertificate" href="/certificate/tum_index" class="nav-link b4"><i class="fas fa-award"></i> <span>Certificate</span></a>
            </li>
            <li class="dropdown">
              <a id="aDelivery" href="/delivery/tum_index" class="nav-link b4"><i class="fas fa-shipping-fast"></i> <span>Delivery</span></a>
            </li>
            <li class="dropdown">
              <a id="aLeave" href="/leave/tum_index" class="nav-link b4"><i class="fas fa-hand-paper"></i> <span>Leave Request</span></a>
            </li>
            <li class="dropdown">
              <a id="aTechnician" href="/job/tum_index" class="nav-link b4"><i class="fas fa-wrench"></i> <span>Job</span></a>
            </li>
            <li class="dropdown">
              <a id="aUser" href="/user/tum_index" class="nav-link b4"><i class="far fa-user"></i> <span>User</span></a>
            </li>
            <li class="dropdown">
            <a id="aMeeting" href="/meeting/tum_index" class="nav-link b4" ><i class="fas fa-comments"></i><span>Meeting</span></a>
            </li>
            <li class="dropdown">
              <a id="aProfile" href="/profile/tum_index" class="nav-link b4"><i class="far fa-id-card"></i> <span>Profile</span></a>
            </li>
          </ul>

          <!-- Logout Confirmation Popup -->
          <div class=" p-3 hide-sidebar-mini  btn-container-log">
            <button class="btn btn-primary btn-lg btn-block btn-icon-split btn-log" onclick="openLogoutPopup()">LOGOUT
            </button>
            <div class="overlay-log" id="overlay-log"></div>
            <div class="popup-log" id="logoutPopup-log">
              <p><b>ออกจากระบบ</b></p>
              <a id="aLogout" href="/logout" class="btn btn-primary" onclick="logout()">&nbsp;&nbsp;Yes&nbsp;&nbsp;</a>
              &nbsp;&nbsp;&nbsp;
              <a class="btn btn-primary" href="#" onclick="closeLogoutPopup()">Cancel</a>
            </div>
          </div>
        </aside>
      </div>
    </div>
  </div>

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
      $('#user_name').html("[" + localStorage.getItem("type").toUpperCase() + "] " + localStorage.getItem("fname") + " " + localStorage.getItem("lname"));
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
      // $('#aImplement').hide();
      $('#aLeave').hide();
      $('#aTechnician').hide();
      $('#aProfile').css('display', 'flex');

      var username = localStorage.getItem("username");
      var role = localStorage.getItem("role");
      var type = localStorage.getItem("type");
      var permission = localStorage.getItem("permission");
      var type_id = localStorage.getItem("type_id");
      console.log(type, type_id, permission);

      ////TEST FOR SUB PERMISSION
      var categories = [{
          permission: "Notify",
          authority: ["Delete", "Create"]
        },
        {
          permission: "Warranty",
          authority: ["Update", "Create"]
        },
        {
          permission: "Purchase",
          authority: ["Update", "Create"]
        },
      ];
      var categoriesJson = JSON.stringify(categories);
      var Notify = "Notify";
      console.log('categoriesJson', categoriesJson);
      $.each(JSON.parse(categoriesJson), function(key, value) {
        if (Notify.indexOf(value.permission) > -1) {
          console.log('Exists: ' + value.permission)
          console.log('authority inArray', $.inArray('Delete', value.authority));
        } else {
          // console.log('Does not exists: ' +value.Role)
        }
      });
      ///END //TEST FOR SUB PERMISSION
      if (localStorage.getItem("permission") == "") {
        localStorage.setItem("permission", JSON.stringify([]));
      }
      $.each(JSON.parse(localStorage.getItem("permission")), function(index, arr) {
        $('#a' + arr).css('display', 'flex');
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

    function checkAuth(page) {
      $('.a' + page).addClass('active');

      if ($.inArray(page, JSON.parse(localStorage.getItem("permission"))) == -1) {
        window.location.href = "/";
      }

    }


    $(document).ready(function() {
      // เมื่อหน้าเว็บโหลดเสร็จแล้ว
      var currentUrl = window.location.href;
      // ดึง URL ปัจจุบัน

      $('.sidebar-menu a').each(function() {
        // สำรวจทุกๆ เมนูใน sidebar
        if (currentUrl.includes($(this).attr('href'))) {
          // ถ้า URL ปัจจุบันมีการอ้างอิงถึงลิงก์เมนูนี้
          $(this).addClass('active');
          // ให้เพิ่มคลาส 'active' ในลิงก์เมนูนี้
          $(this).closest('.dropdown').addClass('active');
          // และให้เพิ่มคลาส 'active' ใน dropdown ที่ครอบลิงก์นี้ด้วย
        }
      });
    });
  </script>

  <!-- General JS Scripts -->
  <script src="../tum/dist/assets/modules/jquery.min.js"></script>
  <script src="../tum/dist/assets/modules/popper.js"></script>
  <!-- <script src="../tum/dist/assets/modules/tooltip.js"></script> -->
  <script src="../tum/dist/assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="../tum/dist/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="../tum/dist/assets/modules/moment.min.js"></script>
  <script src="../tum/dist/assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="../tum/dist/assets/modules/jquery.sparkline.min.js"></script>
  <script src="../tum/dist/assets/modules/chart.min.js"></script>
  <script src="../tum/dist/assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
  <script src="../tum/dist/assets/modules/summernote/summernote-bs4.js"></script>
  <script src="../tum/dist/assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="../tum/dist/assets/js/page/index.js"></script>

  <!-- Page Specific JS File -->
  <script src="../tum/dist/assets/js/page/forms-advanced-forms.js"></script>
  <script src="../tum/dist/assets/modules/summernote/summernote-bs4.js"></script>

  <!-- Template JS File -->
  <script src="../tum/dist/assets/js/scripts.js"></script>
  <script src="../tum/dist/assets/js/custom.js"></script>
  <script src="../tum/dist/assets/js/logoutpopup.js"></script>
  <script src="../tum/dist/assets/js/btt.js"></script>
  <script src="../tum/dist/calendar.min.js"></script>
  <script src="../tum/dist/assets/js/signature.js"></script>
  <script src="../tum/dist/assets/js/accordion.js"></script>
  <script src="../tum/dist/assets/js/pt.min.js"></script>

</body>

</html>