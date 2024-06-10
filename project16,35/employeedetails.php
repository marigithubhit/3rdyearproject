<html>
    <head>
        <link rel="stylesheet" href="product.css">
        <title>Employee details</title>
    </head>
        <body>
            <style>

                </style>
    <div class="container">
        <div class="title">Employee details</div>
        <form action="" method="POST">
        <div class="user-details">
        <div class="input-box">
            <span class="details">Employee name</span>
           <input type="text" name="ename"  pattern="[A-Za-z\s]*" title="Only letters allowed" value="<?php if(isset($_POST['ename'])) echo $_POST['ename'];?>"><br><br>
           </div>
           <div class="input-box">
            <span class="details">Employee password</span>
           <input type="password" name="epassword" pattern="[A-Za-z\s]*" title="Only letters allowed" value="<?php if(isset($_POST['epassword'])) echo $_POST['epassword'];?>"><br><br>
</div>
<div class="input-box">
            <span class="details">Employee salary</span>
          <input type="number" name="esalary" min="1" value="<?php if(isset($_POST['esalary'])) echo $_POST['esalary'];?>"><br><br>
</div>
<div class="input-box">
            <span class="details">Employee phone</span>
            <input type="tel" name="ephone" minlength="10" maxlength="10" value="<?php if(isset($_POST['ephone'])) echo $_POST['ephone'];?>"><br><br>
</div>
</div>
<div class="button">
            <button type="submit" name="insert">INSERT</button><br>
            <button type="submit" name="view">VIEW</button><br><br>
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
        if(isset($_POST['insert']))
        {
            if(empty($name && $password && $salary && $phone))
            {
                echo "<script>alert('fill these all field')";
                die();
            }
            $conn=mysqli_connect("localhost","root","","grocery");
            $query1="Insert into employee values('$name','$password','$salary','$phone')";
            $query2=mysqli_query($conn,$query1);
            if($query2)
            {
                echo "<script>alert('inserted successfully')</script>";
            }
            else{
                echo "<script>alert('not inserted')</script>";
            }
        }
        if(isset($_POST['view']))
        {
            header("Location:employeeview.php");
        }
        }
        ?>