<?php 
session_start();
include "assets/config.php";
$pid=$_GET['id'];
if(isset($_SESSION['fname'])){
    $uname=$_SESSION['fname'];

    $sql1="SELECT id FROM users where fullname='{$uname}'";
    $result1=mysqli_query($conn,$sql1);
    $row1=mysqli_fetch_array($result1);
    //userid fetch

$sql2="SELECT count FROM cart where p_id=$pid AND u_id=$row1[0]";
$result2=mysqli_query($conn,$sql2);
$row2=mysqli_fetch_array($result1);                                         
echo mysqli_num_rows($result2).$sql2;
if(mysqli_num_rows($result2)==0){
    
    $sql="INSERT INTO `cart`(`u_id`, `p_id`,`count`) VALUES ($row1[0],$pid,1)";
    // echo $sql;
    $result=mysqli_query($conn,$sql);
    if($result){
        $_SESSION['uid']=$row1[0];
        echo "success insert";
        header("Location:cart.php");
        }
    }

else{
    // $count=$row2[0]+1;
    $sql="UPDATE `cart` SET `count`=`count`+1 WHERE p_id=$pid AND u_id=$row1[0]";
    echo "$sql";
    $result=mysqli_query($conn,$sql);
    if($result){
        $_SESSION['uid']=$row1[0];
        echo "success";
        header("Location:cart.php");
        }
    }


}
else{
    header("Location:signin.php");

}
?>