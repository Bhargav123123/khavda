<?php
include "assets/config.php";
session_start();
if(isset($_SESSION['fname'])){
  $fname=$_SESSION['fname'];
  $uid=$_SESSION['uid'];
  $topic=$_POST['topic'];
  $feedback=$_POST['feedback'];
  $rate=$_POST['star'];
  $sql="INSERT INTO `feedback`(`u_id`, `topic`, `feedback`, `rate`) VALUES ('$uid','{$topic}','{$feedback}','$rate')";
$result=mysqli_query($conn,$sql);
if($result){
    echo '
    <div class="sent-message">Your feedback has been gate. Thank you!</div>';
}

}
else{
    session_destroy();
   header("Location:index.php"); 
}
?>