<html>
    <form action="" method="POST">
        soap<input type="text" name="soap"><br>
        sugar<input type="text" name="sugar"><br>
        salt<input type="text" name="salt"><br>
        pepper<input type="text" name="pepper"><br>
        surfexcel<input type="text" name="surf"><br>
    <button type="submit" name="submit">submit</button><br>
</form>
</html>
<?php
if($_POST)
{
$soap=$_POST['soap'];
$sugar=$_POST['sugar'];
$salt=$_POST['salt'];
$pepper=$_POST['pepper'];
$surfexcel=$_POST['surf'];
if(isset($_POST['submit']))
{
    $con=mysqli_connect("localhost","root","","store");
    $qry="insert into categories values('$soap','$sugar','$salt','$pepper','$surfexcel')";
    $query=mysqli_query($con,$qry);
    if($query)
    {
        echo "inserted successfully";
    }
    else
    {
        echo "not inserted values in the database";
    }
}
if(isset($_POST['submit']))
{
    $con=mysqli_connect("localhost","root","","store");
    $qry="select * from categories";
    $query=mysqli_query($con,$qry);
    while($row=mysqli_fetch_array($query))
    {
        echo"<p>{$row['soap']}</p>";
        echo"<p>{$row['salt']}</p>";
    }
    
}
}
    ?>

