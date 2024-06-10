<html>
    <link rel="stylesheet" href="tabledesign.css">
    </html>
<?php
{
    $like=$_POST['search'];
   
$conn=mysqli_connect("localhost","root","","grocery");
        $query="select * from products where name like '$like%'";
        $query1=mysqli_query($conn,$query);
        $affected=mysqli_affected_rows($conn);
        if($affected<1)
        {
            echo "<script>alert('data not found')</script>";
            die();
        }
        echo "<div class='tabless'><center><table border=1px colspan=10><tr><th>product id</th><th>product name</th><th>product price</th><th>product stock</th><th>expire date</th><th colspan=2>Action</th></tr>";
        while($row=mysqli_fetch_array($query1))
        {
            echo "<tr><td>{$row['id']}</td>";
            echo "<td>{$row['name']}</td>";
            echo "<td>{$row['price']}</td>";
            echo "<td>{$row['stock']}</td>";
            echo "<td>{$row['edate']}</td>";
            echo "<td><div class=table><a id=gren href=productupdate.php?idd={$row['id']}>update</a></td>";
            echo "<td><a id=red href=delete.php?idd={$row['id']}>delete</a></td></tr></div>";
        }
        echo "</table></center></div>";
    }
       
        ?>