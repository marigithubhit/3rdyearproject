<html>
    <head>
        <title>Order list</title>
</head>
<body>
    <form action="" method="POST">
</form>
<form>
    product id<input type="text" name="pid"><br><br>
    product name<input type="text" name="pname"><br><br>
    <button type="submit" name="order">Order</button>
</form>
</body>
</html>
<?php
if($_POST)
{
    $id=$_POST['pid'];
    $name=$_POST['pname'];
    if($_POST['order'])
    {
        $conn=mysqli_connect('localhost','root','','grocery');
        $query="INSERT INTO category values('$id','$name')";
        $query1=mysqli_query($conn,$query);
        if($query1)
        {
            echo "Item is Ordered";
        }
        else
        {
            echo "Error";
        }
    }
}
?>