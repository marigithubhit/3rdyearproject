<html>

<head>
    <link rel="stylesheet" href="tabledesign.css">
</head>
    </html>

<?php

           $conn=mysqli_connect("localhost","root","","grocery");
            $query1="select * from employee";
            $query2=mysqli_query($conn,$query1);
            echo "<center><table border=2px><tr><th>Employee name</th><th>Employee password</th><th>Employee salary</th><th>Employee phone</th><th colspan=2>Action</th></tr>";
            while($res=mysqli_fetch_array($query2))
            {
                echo "<tr><td>{$res['name']}</td>";
                echo "<td>{$res['password']}</td>";
                echo "<td>{$res['salary']}</td>";
                echo "<td>{$res['phone']}</td>";
                echo "<td><a href=employeeupdate.php?name={$res['name']}>update</a></td>";
                echo "<td><a href=employeedelete.php?name={$res['name']}>delete</a></td></tr>";                                  
            }
            echo "</table></center>";
        
            ?>
