<html>
    <head>
        <link rel="stylesheet" href="tabledesign.css">
</head>
    </html>
    <?php
    {
        $conn=mysqli_connect("localhost","root","","grocery");
        $query="SELECT*FROM employee";
        $query1=mysqli_query($conn,$query);
        echo "<center><table border=2px colspan=10><tr><th>Employee name</th><th>Employee password</th><th>Employee salary</th><th>Employee phone</th></tr>";
        while($row=mysqli_fetch_array($query1))
        {
            echo "</tr><td>{$row['name']}</td>";
            echo "<td>{$row['password']}</td>";
            echo "<td>{$row['salary']}</td>";
            echo "<td>{$row['phone']}</td></tr>";
            
        }
        echo "</table></center>";
    }
    ?>