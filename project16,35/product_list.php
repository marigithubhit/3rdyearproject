<html>
    <head>
        <title>product list</title>
</head>
<body>
    <form action="" method="POST">
        <lable>Id</label>
        <input type="text" name="id"><br><br>
        <label>product price</title>
        <input type="text" name="price"><br><br>
        <label>product name</label>
        <input type="text" name="product"><br><br>
        <button type="submit" name="save">save</button>
        <button type="submit" name="view">View</button>
</form>
</body>
</html>
<?php
{
    $id=$_POST['id'];
    $product=$_POST['product'];
    $price=$_POST['price'];
    if(isset($_POST['save']))
    {
    $conn=mysqli_connect("localhost","root","","grocery_store");
    $query="INSERT INTO product_name values('$id','$price','$product')";
    $query1=mysqli_query($conn,$query);
    if($query1)
    {
        echo "inserted successfully";
    }
    else{
        echo "inserted not successfully";
    }
}
if(isset($_POST['view']))
{
    $conn=mysqli_connect("localhost","root","","grocery_store");
    $query="SELECT * FROM  product_name";
    $query1=mysqli_query($conn,$query);
    echo "<table border=2px><h1>product list</th><tr><th>product price</th></tr><tr><th>product name</th></tr>";
    while($rows=mysqli_fetch_array($query1))
    {
        echo "<tr><td>{$rows['id']}</td></tr>";
        echo "<tr><td>{$rows['price']}</td></tr>";
        echo "<tr><td>{$rows['name']}</td></tr>";
    }
    echo "</table>";
    if($query1)
    {
        echo "select successfully";
    }
    else{
        echo "select not found";
    }
}
}
?>