<html>
    <head>
        <link rel="stylesheet" href="tabledesign.css">
</head>
</html>
<?php
$conn=mysqli_connect("localhost","root","","grocery");
          $query="SELECT * from category";
          $query1=mysqli_query($conn,$query);
          echo "<center><table border=2px><tr><th>category Id</th><th>category name</th><th colspan=2>Action</th></tr>";
          while($row=mysqli_fetch_array($query1))
          {
              echo "<tr><td>{$row['id']}</td>";
              echo "<td>{$row['name']}</td>";
              echo "<td><div class=table><a id=gren href=cateo.php?id={$row['id']}>update</a></td>";
              echo "<td><a id=red href=categorydelete.php?id={$row['id']}>delete</a></td></tr></div>";
          }
          echo "</table></center>";
      
      ?>