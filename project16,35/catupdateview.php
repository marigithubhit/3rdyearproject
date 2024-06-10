<html>
    <head>
        <link rel="stylesheet" href="tabledesign.css">
</head>
</html>

<?php 
{
$conn=mysqli_connect("localhost","root","","grocery");
    $query="SELECT * from category";
    $query1=mysqli_query($conn,$query);
    echo "<center><table border=2px><tr><th>category id</th><th>category name</th></tr>";
    while($row=mysqli_fetch_array($query1))
    {
        echo "<tr><td>{$row['id']}</td>";
        echo "<td>{$row['name']}</td></tr>";
    }
    echo "</table></center>";
}
?>