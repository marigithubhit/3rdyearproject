<?php
if(isset($_GET['idd']))
{
    $id=(int)$_GET['idd'];
    $conn=mysqli_connect("localhost","root","","grocery");
    $query1="SELECT * from products where id=$id";
    $qu=mysqli_query($conn,$query1);
    while($res=mysqli_fetch_array($qu))
    {
        
        $iddd=$res['id'];
        $name=$res['name'];
        $price=$res['price'];
        $stock=$res['stock'];
        $edate=$res['edate'];
    }
}
?>
<html>
    <head>
    <link rel="stylesheet" href="product.css">
</head>
<body>
 


<div class="container">
<div class="title">Product Update</div>
<form action="" method="POST">
<div class="input-box">
    <span class="details">Productid</span>
    <input type="text" name="pid" value="<?php echo $iddd; ?>"><br><br>
</div>
<div class="input-box">
    <span class="details">Productname</span>
    <input type="text" name="pname" value="<?php echo  $name;?>"><br><br>
</div>
<div class="input-box">
    <span class="details">Productprice</span>
    <input type="text" name="pprice" value="<?php echo $price; ?>"><br><br>
</div>
<div class="input-box">
    <span class="details">Stock</span>
    <input type="text" name="pstock" value="<?php echo $stock;?>"><br><br>
</div>
<div class="input-box">
    <span class="details">Expiredate</span>
    <input type="date" name="edate" value="<?php echo $edate;?>"><br><br>
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
    if(isset($_POST['search']))
    {
      header("location:productsearch.php");
    }
    ?>
   <?php
   if(isset($_POST['add']))
   {
    $idd=$_POST['pid'];
    $name=$_POST['pname'];
    $price=$_POST['pprice'];
    $stock=$_POST['pstock'];
    $edate=$_POST['edate'];
    $conn=mysqli_connect("localhost","root","","grocery");
    $query="UPDATE products set id='$idd',name='$name',price='$price',stock='$stock',edate='$edate' where id='$idd'";
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
    header("Location:updateview.php");
   }
   ?>
   