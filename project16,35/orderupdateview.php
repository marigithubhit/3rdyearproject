<html>
    <link rel="stylesheet" href="tabledesign.css">
    </html>
<?php
{
$conn=mysqli_connect("localhost","root","","grocery");
            $query="select * from orderr";
            $query1=mysqli_query($conn,$query);
            echo "<center><table border=2px><tr><th>product Id</th><th>product name</th><th>quantity</th><th>date</th></tr>";
            while($row=mysqli_fetch_array($query1))
            {
                echo "<tr><td>{$row['id']}</td>";
                echo "<td>{$row['name']}</td>";
                echo "<td>{$row['quantity']}</td>";
                echo "<td>{$row['datee']}</td>";
            }
            echo "</table></center>";
        }
        ?>