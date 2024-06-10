<?php
    if($_POST)
    {
        $cat=$_POST['pcat'];
        $name=$_POST['pname'];
        $price=$_POST['pprice'];
        $stock=$_POST['pstock'];
        $date=$_POST['edate'];
         if(isset($_POST['search']))
         {
             header("location:productsearch.php");
        }
        if(isset($_POST['add']))
        {
            if(empty($name && $price && $stock && $date))
            {
                echo "<script>alert('Fill this all field')</script>";
                die();
            }
        $conn=mysqli_connect("localhost","root","","grocery");
        $query="INSERT INTO products values('','$name','$cat','$price','$stock','$date')";
        $query1=mysqli_query($conn,$query);
        if($query1)
        {
            echo "<script>alert('inserted')</script>";
        }
        else
        {
            echo "<script>alert('not inserted')</script>";
        }
    }
    if(isset($_POST['view']))
    {
        header("Location:viewproduct.php");
    }

}
?>
<html>
    <head>
        <title>product list</title>
        <link rel="stylesheet" href="product.css">
       
</head>
<style>
    body{
        display: flex;
        flex-direction: column;
    }
</style>

<body>
        <div class="container">
        <div class="title">Product list</div><br>
        <form action="producttlike.php" method="POST">
        <center><input type="text" name="search" placeholder="  Search product name" style="width:50%;height:45px;margin-right:330px;border-radius:5px" >
       <button type="submit" name="btn" style="height:45px;width:120px;margin-left:160px;margin-top:-45px;" >Search</button></center>
</form>
<!-- <?php
// if($_POST)

// {

//     if(isset($_POST['btn']))
//     {
        
//         header("Location:producttlike.php");
//     }
// }
?> -->
        <form action="" method="POST">
    <div class="user-details">
        <!-- <div class="input-box">
            <span class="details">Productid</span>
            <input type="text" name="pid" value="<?php $conn=mysqli_connect("localhost","root","","grocery");
                                                    $query="select * from products";
                                                    $query1=mysqli_query($conn,$query);
                                                    while($res=mysqli_fetch_array($query1))
                                                    {
                                                        $jerish=$res['id'];
                                                    }
                                                    
                                                    ?>"><br><br>
        </div> -->
        <div class="input-box">
            <span class="details">Productname</span>
            <input type="text" name="pname" pattern="[A-Za-z\s]*" title="Only letters allowed"  value="<?php if(isset($_POST['pname']))echo $_POST['pname'];?>"><br><br>
        </div>
        <div class="input-box">
            <span class="details">Product category</span>
            <input type="text" name="pcat" pattern="[A-Za-z\s]*" title="Only letters allowed" value="<?php if(isset($_POST['cat']))echo $_POST['cat'];?>"><br><br>
        </div>
        <div class="input-box">
            <span class="details">Productprice</span>
            <input type="number" name="pprice" min="1" value="<?php if(isset($_POST['pprice']))echo $_POST['pprice'];?>"><br><br>
        </div>
        <div class="input-box">
            <span class="details">Stock</span>
            <input type="number" name="pstock" min="1" value="<?php if(isset($_POST['pstock']))echo $_POST['pstock'];?>"><br><br>
        </div>
        <div class="input-box">
            <span class="details">Expiredate</span>
            <?php 
            
            ?>
            <input type="date" name="edate" min="<?php echo date('Y-m-d')?>" value="<?php if(isset($_POST['edate']))echo $_POST['edate'];?>"><br><br>
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