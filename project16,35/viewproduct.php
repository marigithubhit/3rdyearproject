<html>
<head>
    <title>Document</title>
    <link rel="stylesheet" href="tabledesign.css">
</head>
<body>
    <?php
        
            $conn=mysqli_connect("localhost","root","","grocery");
            $quer="SELECT * FROM products";
            $que=mysqli_query($conn,$quer);
            echo "<div class='tabless'><center><table border=1px colspan=10><tr><th>product id</th><th>product name</th><th>product category</th><th>product price</th><th>product stock</th><th>expire date</th><th colspan=2>Action</th></tr>";
            while($row=mysqli_fetch_array($que))
            {
                echo "<tr><td>{$row['id']}</td>";
                echo "<td>{$row['name']}</td>";
                echo "<td>{$row['cat']}</td>";
                echo "<td>{$row['price']}</td>";
                echo "<td>{$row['stock']}</td>";
                echo "<td>{$row['edate']}</td>";
                echo "<td><div class=table><a id=gren href=productupdate.php?idd={$row['id']}>update</a></td>";
                echo "<td><a id=red href=delete.php?idd={$row['id']}>delete</a></td></tr></div>";
            }
            echo "</table></center></div>";
        
    ?>
</body>
</html>