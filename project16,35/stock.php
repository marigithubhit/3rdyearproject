<html>

        <link rel="stylesheet" href="tabledesign.css">

        </html>
       
        <?php
{
    echo "<center><table border=2px><th>product id</th><th>product name</th><th>stock</th><th>Expired date</th></tr>";
    $conn=mysqli_connect("localhost","root","","grocery");
    $query="SELECT id,name,stock,edate from products";
    $query1=mysqli_query($conn,$query);
    while($rows=mysqli_fetch_array($query1))
    {
        echo "<tr><td>{$rows['id']}</td>";
        echo "<td>{$rows['name']}</td>";
        echo "<td>{$rows['stock']}</td>";
        echo "<td>{$rows['edate']}</td></tr>";
        
    }
    echo "</table></center><br>";


}
?>
