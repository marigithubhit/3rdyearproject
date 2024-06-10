<html>
    <head>
        <title>Billing</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="search">
        <button type="submit" name="submit">Submit</button><br><br>
        customerId<input type="text" name="id"><br><br>
        product name<input type="text" name="name"><br><br>
        quentity<input type="number" name="quentity"><br><br>
        date<input type="date" name="edate"><br><br>
        <button type="submit" name="submit">ADD</button>
</form>
</body>
</html>
<?php{
    if($_POST)
    {
        $id=$_POST['id'];
        $name=$_POST['name'];
        $quentity=(int)$_POST['quentity'];
        if(isset($_POST['submit']))
        {
            $conn=mysqli_connect("localhost","root","","grocery");
            $query="SELECT name,price,stock from product";
            $query1=mysqli_query($conn,$query);
            echo "<h1>bill list</h1>";
            echo "<center><table border=2px><tr><th>customer id</th><th>product name</th><th>quantity</th><th>cost</th></tr>";
            $cost=0;
            while($rows=mysqli_fetch_array($query1))
            {
                if($rows['name']==$name && $rows['stock']<=$quenity)
                {
                    echo "NOT AVAILABLE";
                }
                else
                {
                    $cost=$rows['price'] * $quantity;
                    echo "<tr><td>$id</td>";
                    echo "<td>{$rows['name']}</td>";
                    echo "<td>$quantity</td>";
                    echo "<td>$cost</td><tr>";
                }
                echo "</table></center>";
            }
        }
    }
}
?>