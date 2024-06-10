<?php
if(isset($_GET['id']))
{
    $id=(int)$_GET['id'];
    $conn=mysqli_connect("localhost","root","","grocery");
    $query="DELETE from orderr where id='$id'";
    $query1=mysqli_query($conn,$query);
    if($query)
    {
        echo "<script>alert('deleted successfully')</script>";
        header("Location:order.php");
    }
    else{
        echo "<script>alert('deleted not successfully')</script>";
    }
}
?>