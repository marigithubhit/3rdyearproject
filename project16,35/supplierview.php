<html>
    <link rel="stylesheet" href="tabledesign.css">
    </html>

<?php
$conn=mysqli_connect("localhost","root","","grocery");
        $query1="select * from supplier";
        $query2=mysqli_query($conn,$query1);
        echo "<center><table border=2px><tr><th>first name</th><th>last name</th><th>phone</th><th>email</th><th>department</th><th>product name</th><th>quantity</th><th>date</th><th colspan=2>Action</th></tr>";
     while($res=mysqli_fetch_array($query2))
     {
        echo "<tr><td>{$res['fname']}</td>";
        echo "<td>{$res['lname']}</td>";
        echo "<td>{$res['phone']}</td>";
        echo "<td>{$res['email']}</td>";
        echo "<td>{$res['department']}</td>";
        echo "<td>{$res['pname']}</td>";
        echo "<td>{$res['quantity']}</td>";
        echo "<td>{$res['datee']}</td>";
        echo "<td><a href=employeeypdate.php?fname={$res['fname']}>update</a></td>";
        echo "<td><a href=supplierdelete.php?fname={$res['fname']}>delete</a></td>";        
     }
     echo "</table></center>";
     ?>