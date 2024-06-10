<?php
{
    $like=$_POST['search'];
    $conn=mysqli_connect("localhost","root","","grocery");
    $query="SELECT * from category where name like '$like%'";
    $query1=mysqli_query($conn,$query);
    echo "<center><table border=2><tr><th>product id</th><th>product name</th><th>price</th><th></tr>";
    while($rows=mysqli_fetch_array($query1))
    {
        echo "<tr><td>{$rows['id']}</td>";
        echo "<td>{$rows['name']}</td></tr>";

    }
    echo "</table></center>";
}
?>