<?php
include 'database.php';
?>

<!DOCTYPE html>
<html>
<head>
<script>

  if ( localStorage.getItem("role") != null ) {
    if( localStorage.getItem("role")=='wtc'){
      if (localStorage.getItem("type")=='driver'){
        window.location.href="./driver/joblist";
      }else if (localStorage.getItem("type")=='technician'){
        window.location.href="./technician/joblist";
      }else{
        window.location.href="index";
      }
    }else if(localStorage.getItem("role")=='partner') {
      window.location.href="./external/joblist";
    }
    
  }
</script>
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: #f0f3f8;
}
input[type=text],input[type=password] {
  width: 100%;
  padding: 8px 20px;
  box-sizing: border-box;
  border: none;
  border-bottom: 1px solid #ccc;
}
/* ------- page login ------- */
.outer {
  display: table;
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
}
.middle {
  display: table-cell;
  vertical-align: middle;
}
.inner {
  margin: 0 auto;
  width: 90%;
  max-width: 500px;
  text-align: center;
}
.imglogin {
  width: 70%;
  padding: 20px;
}
#labellogin {
  text-align: left;
  color: #c1c1c1;
  margin-top: 40px;
}
.card {
  border-radius: 10px;
  border: 1px solid #dddddd;
  border-bottom: 25px solid #ee872b;
  padding: 50px 40px;
  text-align: center;
  background-color: white;
  box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%);
  transition: 0.3s;
}
.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}
.btn {
  border-radius: 5px;
  border: none;
  color: #ffffff;
  font-size: 18px;
  background-color: #ee872b;
  padding: 20px;
  margin-top: 40px;
  width: 90%;
  transition: all 0.5s;
}
.regis {
  border: 1px solid #ee872b;
  color: #ee872b;
  background-color: #ffffff;
  margin-top: 15px;
}
</style>


<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ee872b;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>

  <div class="outer">
    <div class="middle">
      <div class="inner">
        <img src="/img/logo-LinkService.png" class="imglogin"> 
        <div class="card">
          <form action="" method="POST">
            <input type="hidden" name="new" value="1" />
            <div id="labellogin">
              Username
              <input type="text" name="username" id="username" required>
            </div>
            <div id="labellogin">
              Password
              <input type="password" name="password" id="password" required>
            </div>
            <div style ="margin-top:40px">
              <div style="display:flex;justify-content: flex; margin-end:50px;
            font-size: 18px;">
                    <input id="role" name="role" type="text" hidden value="wtc">
                    <p style="margin: auto 10px;">WTC</p>
                    <label class="switch" style="margin-top:10px">
                        <input id="cb_role" type="checkbox" onchange="changeRole()">
                        <span class="slider round"></span>
                    </label>
                    <p style="margin: auto 10px;">Partner</p>
                </div>
            </div>

            <div style="text-align: left;margin-top: 40px;" class="external">
              บริษัท
              <select class="inputs" id="company" name="company" >
                    <option value="vserveplus">vServePlus</option>
                    <option value="allit">ALL IT</option>
                </select>
            </div>
            <button id="btn_login" class="btn" type="submit">Login</button>
          </form>
		<!--
          <button class="btn regis" type="submit">Register</button>
		-->
        </div>
	    </div>
    </div>
  </div>

  <?php

  if(isset($_POST['new']) && $_POST['new']==1){
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $role = $_REQUEST['role'];
    $company = $_REQUEST['company'];
    $str_role = "";
    if($role =='wtc'){
      $sql = " SELECT u.* , tp.permission tp_permission FROM user u
      left join type_permission tp on tp.id = u.type_id WHERE username='$username' and password='$password' and u.deleted_datetime is null ";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        if ($row = $result->fetch_assoc()) {
          ?>
          <script>
            var username = "<?php echo ucfirst($username); ?>";
            var fname = "<?php echo $row['fname']; ?>";
            var lname = "<?php echo $row['lname']; ?>";
            var user_type = "<?php echo $row['type']; ?>";
            var user_id = "<?php echo $row['id']; ?>";
            localStorage.setItem("id",user_id);
            localStorage.setItem("username",username);
            localStorage.setItem("fname",fname);
            localStorage.setItem("lname",lname);
            localStorage.setItem("telephone","<?php echo $row['telephone']; ?>");
            localStorage.setItem("email","<?php echo $row['email']; ?>");
            localStorage.setItem("position","<?php echo $row['position']; ?>");
            localStorage.setItem("type",user_type);
            localStorage.setItem("role",'wtc');
            localStorage.setItem("member","<?php echo $row['member']; ?>");
            localStorage.setItem("permission",'<?php echo $row['tp_permission']; ?>');
            localStorage.setItem("type_id","<?php echo $row['type_id']; ?>");
            // localStorage.setItem("driver_id","<?php echo $row['type_id']; ?>");  
            localStorage.setItem("driver_id","6"); //for test driver 
      <?php
      echo 'window.location.href="index";';
        // if($row['type'] == 'technician'){
        //   // echo 'console.log(username)';
        //         echo 'window.location.href="./technician/joblist";';
        // }else if($row['type'] == 'driver'){
        //       $sql_driver = " SELECT * FROM driver WHERE username='$username' ";
        //       $result_driver = $conn->query($sql_driver);
        //       if ($result_driver->num_rows > 0) {
        //           if ($row_driver = $result_driver->fetch_assoc()) {
        //   ?>
        //     localStorage.setItem("driver_id","<?php echo $row_driver['id']; ?>");
        //   <?php
        //           }
        //       }
        //     echo 'window.location.href="./driver/joblist";';
        // }else{
        //   echo 'console.log(username);';
        //     echo 'window.location.href="index";';
        // }
      ?>
          </script>
          <?php
        }
      }else {
        echo "<script>";
        // echo "console.log(\"".$sql."\") ;";
        echo "alert('Username/Password is incorrect.');";
        echo "</script>";
      }

    }else{
      $sql = " SELECT * FROM external_technician WHERE username='$username' and password='$password' and  vendor_name = '$company' ";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        if ($row = $result->fetch_assoc()) {
        setcookie('username', $username, time() + (86400 * 30), "/");
          ?>
          <script>
            var username = "<?php echo ucfirst($username); ?>";
            var fname = "<?php echo $row['fname']; ?>";
            var lname = "<?php echo $row['lname']; ?>";
            var user_type = "<?php echo $row['type']; ?>";
            var vendor_name = "<?php echo $row['vendor_name']; ?>";
            var user_id = "<?php echo $row['id']; ?>";
            localStorage.setItem("id",user_id);
            localStorage.setItem("username",username);
            localStorage.setItem("fname",fname);
            localStorage.setItem("lname",lname);
            localStorage.setItem("type",user_type);
            localStorage.setItem("role",'partner');
            localStorage.setItem("member","<?php echo $row['member']; ?>");
            localStorage.setItem("permission","<?php echo $row['permission']; ?>");
            localStorage.setItem("type_id","<?php echo $row['type_id']; ?>");
            localStorage.setItem("vendor_name",vendor_name);
            window.location.href="./external/";
          </script>
          <?php
        }
      
      } else {
        echo "<script>";
        echo "alert('Username/Password is incorrect.');";
        echo "</script>";
      }
    }
    
    $conn->close();
  }
  ?>

  <script>
    $('.external').hide();
    function changeRole() {
        if ($('#cb_role').is(":checked")) {
            $('#role').val("partner");
            $('.external').show();

        } else {
            $('#role').val("wtc");
            $('.external').hide();
        }
        console.log($('#role').val());
    }
$(document).ready(function () {
  $('#btn_login1').click(function(){
    $.post('./post_login.php', {
        username: $('#username').val(),
        password: $('#password').val(),
        role: $('#role').val(),
    }, function(data){
        console.log(data);
    },'json');
  });

});
  </script>

</body>
</html>