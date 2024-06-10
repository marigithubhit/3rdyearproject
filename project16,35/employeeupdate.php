<?php
if(isset($_GET['name']))
{
    $name=$_GET['name'];
    $conn=mysqli_connect("localhost","root","","grocery");
    $query1="select * from employee where name='$name'";
    $qu=mysqli_query($conn,$query1);
    while($res=mysqli_fetch_array($qu))
    {
        $name=$res['name'];
        $password=$res['password'];
        $salary=$res['salary'];
        $phone=$res['phone'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Details</title>
    <link rel="stylesheet" href="product.css">
</head>
<body>
    <div class="container">
        <div class="title">Employee update</div>
    <form action="" method="POST" align="center">
    <div class="user-details">
        <div class="input-box">
            <span class="details">employee name</span>
       <input type="text" name="ename" value="<?php echo $name;?>"><br><br>
</div>
        <div class="input-box">
        <span class="details">employee password</span>
        <input type="password" name="epassword" value="<?php echo $password;?>"><br><br>
</div><br><br>
        <div class="input-box">
        <span class="details">employee salary</span>
        <input type="number" name="esalary" value="<?php echo $salary;?>"><br><br>
</div>
        <div class="input-box">
        <span class="details">employee phone</span>
        <input type="number" name="ephone" value="<?php echo $phone;?>"><br><br>
</div>
</div>
<div class="button" align="center">
        <button type="submit" name="update">UPDATE</button><br>
        <button type="submit" name="view">VIEW</button>
</div>
    </form>
</div>
</body>
</html>
<?php
if($_POST)
{
    $name=$_POST['ename'];
    $password=$_POST['epassword'];
    $salary=$_POST['esalary'];
    $phone=$_POST['ephone'];
    if(isset($_POST['update']))
    {
        $conn=mysqli_connect("localhost","root","","grocery");
        $query="update employee set name='$name',password='$password',salary='$salary',phone='$phone' where name='$name'";
        $query1=mysqli_query($conn,$query);
        if($query1)
        {
            echo "<script>alert('updated')</script>";
        }
        else{
            echo "<script>alert('not')</script>";
        }
    }
    if(isset($_POST['view']))
    {
      header("location:employeeupdateview.php");
    }
}
?>