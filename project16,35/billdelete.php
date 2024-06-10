<?php
if(isset($_GET['id']))
{
    $id=(int)$_GET['id'];
    $conn=mysqli_connect("localhost","root","","grocery");
    $q="DELETE from adddata where id='$id'";
    $qu=mysqli_query($conn,$q);
    if($qu)
    {
        echo "deleted successfully";
        header("Location:grocerybill.php");
    }
    else{
        echo "delete not successfully";
    }
}
?>