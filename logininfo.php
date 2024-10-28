<?php
	$username = "<script>localStorage.getItem('username')</script>";
	$role = "<script>localStorage.getItem('role')</script>";
?>
<script>
  // if (localStorage.getItem("username")==null) {
  //   // window.location.href="login";
  //   window.location.href="//<?php //echo  getenv('HTTP_HOST'); ?>/login";
  // }else if (localStorage.getItem("type")=='driver' || localStorage.getItem("type")=='technician'){
	//   // window.location.href="./driver/joblist";
  //   // window.location.href="login";
  //   window.location.href="//<?php //echo  getenv('HTTP_HOST'); ?>/login";
  // } 
  // // else if (localStorage.getItem("type")=='technician') {
	// //   window.location.href="./technician/joblist";
  // // } 
</script>

<script>
  if (localStorage.getItem("role")!= 'wtc') {
    // window.location.href="login";
    window.location.href="//<?php echo  getenv('HTTP_HOST'); ?>/login";
  }
</script>