<html>
    <head>
        <title>product list</title>
</head>
<link rel="stylesheet" href="product.css">

<body>
    
        </body>
        </html>
        <?php
{
if(isset($_GET['id']))
{
    $id=(int)$_GET['id'];
    $conn=mysqli_connect("localhost","root","","grocery");
    $query="SELECT * FROM category where id='$id'";
    $query1=mysqli_query($conn,$query);
    $rows=mysqli_fetch_array($query1);
}
}
?>
<div class="container">
<div class="title">category list</div>
<form action="" method="POST">
    <div class="user-details">
        <div class="input-box">
    <span class="details">Category id</span>
<input type="text" name="id" value="<?php echo $rows["id"];?>"><br><br>
</div>
<div class="input-box">
    <span class="details">Category name</span>
<input type="text" name="name" value="<?php echo $rows["name"];?>"><br><br>
</div>
</div>
<div class="button" align="center">
<button type="submit" name="add">ADD</button><br>
<button type="submit" name="view">VIEW</button>
</div>
</div>
<?php
if(isset($_POST['add']))
{
    $idd=$_POST['id'];
    $namee=$_POST['name'];
    $conn=mysqli_connect("localhost","root","","grocery");
    $query="update category set id='$idd',name='$namee' where id='$idd'";
    $query1=mysqli_query($conn,$query);
    if($query1)
    {
        echo "<script>alert('updated successfully')</script>";
    }
    else{
        echo "<script>alert('not updated')</script>";
    }
}
if(isset($_POST['view']))
{
   header("Location:catupdateview.php");
}
?>
<!-- <html>
    <form action="" method="POST">
        <button type="submit" name="back">BACK</button>
        <button type="submit" name="home">HOME</button>
        <a href="#">TOP</a>
</form>
</html> -->
