<html>
    <head>
<link rel="stylesheet" href="tabledesign.css">
</head>
    </html>
<?php
{
$conn=mysqli_connect("localhost","root","","grocery");
    $query="SELECT * from products";
    $query1=mysqli_query($conn,$query);
    echo "<center><table border=2px colspan=10><tr><th>product id</th><th>product name</th><th>product price</th><th>product stock</th><th>expire date</th></tr>";
    while($row=mysqli_fetch_array($query1))
    {
        echo"<tr><td>{$row['id']}</td>";
        echo"<td>{$row['name']}</td>";
        echo"<td>{$row['price']}</td>";
        echo"<td>{$row['stock']}</td>";
        echo"<td>{$row['edate']}</td></tr>";
    }
    echo"</table></center>";
   }
   ?>