<?php
{
    $likeee=$_POST['search'];
    $conn=mysqli_connect("localhost","root","","grocery");
    $query="SELECT * from category where cnam like '$likeee%'";
    $query1=mysqli_affected_rows($conn);
    if($affected < 1)
    {
        echo "<script>alert('Data not found')</script>";
    }
    else{
        echo "<center><table border=2px><tr><th>category id</th><th>category name</th></tr>";
        while($row=mysqli_fetch_array($query1))
        {
            echo "<tr><td>{$row['id']}</td>";
            echo "<td>{$row['name']}</td></tr>";
        }
        echo "</table></center>";
    }
}
?>