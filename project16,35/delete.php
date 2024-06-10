 <?php
 if(isset($_GET['idd']))
 {
    $idd=(int)$_GET['idd'];
    $conn=mysqli_connect("localhost","root","","grocery");
    $query="DELETE from products where id=$idd";
    $query1=mysqli_query($conn,$query);
    if($query1)
    {
        echo "<script>alert('Deleted successfully')</script>";
        header('Location:productlistee.php');
    }
    else{
        echo "<script><alert('deleted not successfully')</script>";
    }
 }
 ?>