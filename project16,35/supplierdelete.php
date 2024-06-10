<?php
if(isset($_GET['fname']))
{
    $fname=$_GET['fname'];
    $conn=mysqli_connect("localhost","root","","grocery");
    $query1="DELETE from supplier where fname='$fname'";
    $qu=mysqli_query($conn,$query1);
    if($qu)
    {
       "<script>alert('deleted successfully')</script>";
    }
    else{
        echo "<script>alert('deleted not successfully')</script>";
    }
}
?>