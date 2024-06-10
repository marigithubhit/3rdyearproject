<html>
    <head>
        <title>urgently needed product</title>
</head>
<link rel="stylesheet" href="tabledesign.css">

    <body>
        
            </body>
        </html>
        <?php
        {
            $conn=mysqli_connect("localhost","root","","grocery");
            $query="SELECT id,name,stock,edate from products";
            $query1=mysqli_query($conn,$query);
            echo "<center><table boreder=2px><tr><th>id</th><th>product name</th><th>stock</th><th>expired date</th></tr>";
            while($rows=mysqli_fetch_array($query1))
            {
                $stock=$rows['stock'];
                if($stock<=101)
                {
                    echo "<tr><td>{$rows['id']}</td>";
                    echo "<td>{$rows['name']}</td>";
                    echo "<td>{$rows['stock']}</td>";
                    echo "<td>{$rows['edate']}</td></tr>";
                }
            }
            echo "</table></center>";
        }            
        ?>
        <html>
            <!-- <form action="" method="POST">
            <button type="submit" name="home">Home</button>
            <a href="#">TOP</a>
    </form> -->
    </html>
    <?php
    {
        if(isset($_POST['home']))
        {
            header("location:orderupdate.php");
        }
    }
    ?>