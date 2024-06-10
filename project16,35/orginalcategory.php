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
<html>
    <head>
    <link rel="stylesheet" href="product.css">
</head>
<body>
</body>
<div class="container">
<div class="title">category list</div><br>
<form action="categorylike.php" method="POST">
        <center><input type="text" name="search" placeholder="  Search here" style="width:58%;height:45px;margin-right:300px;border-radius:5px;" >
       <button type="submit" name="btn" style="height:45px;width:90px;margin-left:200px;margin-top:-45px;" >Search</button></center>
</form>
<form action="" method="POST">
<div class="user-details">
<div class="input-box">
    <span class="details">category id</span>
    <input type="number" name="id" min="1" value="<?php if(isset($_POST['id']))echo $_POST['id']; ?>"><br><br>
</div>
<div class="input-box">
    <span class="details">category name</span>
    <input type="text" name="name" pattern="[A-Za-z\s]*" title="Only letters allowed" value="<?php if(isset($_POST['name']))echo $_POST['name'];?>"><br><br>
</div>
</div>
    <div class="button" align="center">
<button type="submit" name="add">ADD</button><br>
<button type="submit" name="view">VIEW</button>
</div>
</div>
</form>
</html>
    <?php
  if($_POST)
  {
      $id=$_POST['id'];
      $name=$_POST['name'];
    //  if(isset($_POST['search']))
    //   {
    //        header("categorylike.php");
    //    }
      if(isset($_POST['add']))
      {
          $id=(int)$_POST['id'];
          $name=$_POST['name'];
          if(empty($id && $name))
          {
              echo "<script>alert('Fill this two field')</script>";
              die();
              
          }
          // $conn=mysqli_connect("localhost","root","","grocery");
          // $select="SELECT * from category";
          // $select1=mysqli_fetch_array($conn,$select);
          // while($rows=mysqli_fetch_array($select1))
          // {
          //     $idd=$rows['id'];
          //     $namee=$rows['name'];
          // }
          // if($id == $idd or $name=$namee)
          // {
          //     echo "<script>alert('already exist')</script>";
          //     die();
          // }
          $conn=mysqli_connect("localhost","root","","grocery");
    
          $que="INSERT INTO category values($id,'$name')";
          $q=mysqli_query($conn,$que);
          if($q)
          {
              echo "<script>alert('inserted')</script>";
          }
          else{
              echo "<script>alert('not inserted')</script>";
          }
      }
      if(isset($_POST['view']))
      {
          header("Location:categoryview.php");
      }
  }
  ?>
 


        
