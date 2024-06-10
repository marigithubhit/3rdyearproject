<?php
    if(isset($_GET['name']))
    {
        $jerish=$_GET['name'];
        echo $jerish;
        $conn=mysqli_connect("localhost","root","","grocery");
        $query="DELETE from employee where name='$jerish'";
        $query1=mysqli_query($conn,$query);
        if($query1)
        {
            echo "<script>alert('deleted successfully')</script>";
        }
        else{
            echo "<script>alert('not successfully')</script>";
        }
    }

?>