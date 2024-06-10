<?php
if(isset($_GET['id']))
{
    $id=(int)$_GET['id'];
    $conn=mysqli_connect("localhost","root","","grocery");
    $query="DELETE from category where id='$id'";
    $query1=mysqli_query($conn,$query);
    if($query1)
    {
        echo "<script>alert('deleted successfully')</script>";
         header("location:categoryview.php");
    }
    else
    {
    echo "<script>alert('not successfully')</script>";
}
}
?>