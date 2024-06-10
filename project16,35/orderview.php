<html>
    <head>
        <link rel="stylesheet" href="tabledesign.css">
</head>
</html>
    <?php
$conn=mysqli_connect("localhost","root","","grocery");
            $query="select * from orderr";
            $query1=mysqli_query($conn,$query);
            echo "<center><table border=2px><tr><th>product Id</th><th>product name</th><th>quantity</th><th>date</th><th colspan=2>Action</th></tr>";
            while($row=mysqli_fetch_array($query1))
            {
                echo "<tr><td>{$row['id']}</td>";
                echo "<td>{$row['name']}</td>";
                echo "<td>{$row['quentity']}</td>";
                echo "<td>{$row['date']}</td>";
                echo "<td><div class=table><a id=gren href=orderupdate.php?id={$row['id']}>update</a></td>";

                echo "<td><a id=red href=orderdelete.php?id={$row['id']}>delete</a></td></tr></div>";
            }
            echo "</table></center>";
            ?>