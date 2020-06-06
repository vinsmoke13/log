<?php

include 'config.php';
$msg=$_POST['text'];
$username=$_POST['username'];

$sql="INSERT INTO `msgs`(`msg`,`username`,`stime`) VALUES('$msg','$username',CURRENT_TIMESTAMP);";
mysqli_query($conn,$sql);
mysqli_close($conn);
?>