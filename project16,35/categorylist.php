<html>
    <head>
        <title>Category list</title>
</head>
<body>
    <form action="like.php" method="POST">
    <center><input type="text" name="search">
    <button type="submit" name="submit">search</button><br><br>
</form>
<form>
    category ID<input type="text" name="cid"><br><br>
    category name<input type="text" name="cname"><br><br>
    <button type="submit" name="add">ADD</button><br><br>
    <button type="submit" name="view">VIEW</button>
</form>
</body>
</html>
<?php
if($_POST)
{
    $id=$_POST['cid'];
    $name=$_POST['cname'];
    if(isset($_POST['add']))
    {
        $conn=mysqli_connect('localhost','root','','grocery');
        $query="INSERT INTO category values('$id','$name')";
        $query1=mysqli_query($conn,$query);
        if($query1)
        {
            echo "Inserted successfully";
        }
        else{
            echo "could not insert";
        }
    }
    if(isset($_POST['edit']))
    {
        header("location:category.php");
        $conn=mysqli_connect('localhost','root','','grocery');
        $query="INSERT into category values('$id','$name')";
        $query1=mysqli_query($conn,$query);
        if($query1)
        {
            echo "Inserted successfully";
        }
        else{
            echo "NOT Inserted";
        }
    }
    if(isset($_POST['Delete']))
    {
        $conn=mysqli_connect('localhost','root','','grocery');
        $query="DELETE*from category where cname='$name'";
        $query1=mysqli_query($conn,$query);
        if($query1)
        {
            echo "Deleted successfully";
        }
        else{
            echo "could not delete";
        }
    }
    if(isset($_POST['view']))
    {
        $conn=mysqli_connect('localhost','root','','grocery');
        $query="SELECT*from category";
        $query1=mysqli_query($conn,$query);
        echo"<center><table border=2px><tr><th>category id</th>category name</th></tr>";
        while($row=mysqli_fetch_array($query1))
        {
            echo "<tr><td>{$row['cid']}</td>";
            echo "<td>{$row['cname']}</td></tr>";
        }
        echo "<table></center>";
    }
}