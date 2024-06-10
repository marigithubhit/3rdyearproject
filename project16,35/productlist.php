<html>
    <head>
        <title>product list</title>
        <link rel="stylesheet" href="product.css">
    <head>
        <body>
        <div class="container">
        <div class="title">Product list</div>
        <form action="" method="POST">
    <div class="user-details">
        <div class="input-box">
            <span class="details">Productid</span>
            <input type="text" name="pid" value="<?php if(isset($_POST['pid']))echo $_POST['pid'];?>"><br><br>
        </div>
        <div class="input-box">
            <span class="details">Productname</span>
            <input type="text" name="pname" value="<?php if(isset($_POST['pname']))echo $_POST['pname'];?>"><br><br>
        </div>
        <div class="input-box">
            <span class="details">Productprice</span>
            <input type="text" name="price" value="<?php if(isset($_POST['price']))echo $_POST['price'];?>"><br><br>
        </div>
        <div class="input-box">
            <span class="details">Stock</span>
            <input type="text" name="stock" value="<?php if(isset($_POST['stock']))echo $_POST['stock'];?>"><br><br>
        </div>
        <div class="input-box">
            <span class="details">Expiredate</span>
            <input type="date" name="edate" value="<?php if(isset($_POST['edate']))echo $_POST['edate'];?>"><br><br>
        </div>
</div>
<div class="button" align="center">
    <button type="submit" name="add">ADD</button><br>
    <button type="submit" name="view">VIEW</button>
</div>
</form>
</div>
</body>
</html>
<?php
if($_POST)
{
    $id=$_POST['pid'];
    $name=$_POST['pname'];
    $price=$_POST['price'];
    $stock=$_POST['stock'];
    $date=$_POST['edate'];
    if(isset($_POST['add']))
    {
        $conn=mysqli_connect('localhost','root','','grocery');
        $query="INSERT into product values('$id','$name','$price','$stock','$date')";
        if($query1)
        {
            echo "Inserted successfully";
        }
        else{
            echo "Not inserted";
        }
    }
    if(isset($_POST['edit']))
    {
        //header("location:product1.php");
        $conn=mysqli_connect('localhost','root','','grocery');
        $query="INSERT into product values('$id','$name','$price','$stock','$date')";
        $query1=mysqli_query($conn,$query);
        if($query1)
        {
            echo "Inserted successfully";
        }
        else{
            echo "Not Inserted";
        }
    }
    if(isset($_POST['Delete']))
    {
        $conn=mysqli_connect('localhost','root','','grocery');
        $query="DELETE from products where name=$name";
        $query1=mysqli_query($conn.$query);
        if($query1)
        {
            echo "Deleted successfully";
        }
        else{
            echo "Could not Delete";
        }
    }
    if(isset($_POST['view']))
    {
        $conn=mysqli_connect('localhost','root','','grocery');
        $query="SELECT*from products";
        $query1=mysqli_query($conn,$query);
        echo "<center><table><table border=2px><tr><th>product id</th><th>product name</th><th>product price</th><th>product stock</th><th>date</th><tr>";
        while($row=mysqli_fetch_array($query1))
        {
            echo"<tr><td>{$row['id']}</td>";
            echo"<td>{$row['name']}</td>";
            echo"<td>{$row['price']}</td>";
            echo"<td>{$row['stock']}</td>";
            echo"<td>{$row['edate']}</td></tr>";
        }
        echo "</table></center>";
    }
}
?>