<?php
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $conn=mysqli_connect("localhost","root","","grocery");
    $query1="SELECT * from orderr where id='$id'";
    $qu=mysqli_query($conn,$query1);
    while($res=mysqli_fetch_array($qu))
    {
        $id=$res['id'];
        $name=$res['name'];
        $quantity=$res['quantity'];
        $date=$res['datee'];
    }
}
?>
    <html>
    <head>
        <title>order list</title>
</head>
    <link rel="stylesheet" href="formdesign.css">
    <body>
        
            <?php
           
            ?>
            
               <div class="container">
                  <div class="title">order</div>
                  <form action="" method="POST" >
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">product id</span>
                <input type="text" name="iddd" value="<?php echo $id;?>"><br><br>
</div>
<div class="input-box">
                            <span class="details">product id</span>
              <input type="text" name="name" value="<?php echo $name;?>"><br><br></div>
                <div class="input-box">
                            <span class="details">product id</span>
      <input type="number" name="quentity" value="<?php echo $quantity;?>"><br><br></div>
                <div class="input-box">
                            <span class="details">product id</span>
                <input type="date" name="datee" value="<?php echo $date;?>"><br><br></div>
                <div class="button" align="center" >
                <button type="submit" name="order" style="width: 620px;">ORDER</button><br>
                <button type="submit" name="view">View</button></div>
        </form>
</div>
        </body>
        </html>
        <?php
        if(isset($_POST['order']))
        {
            $id=$_POST['iddd'];
            $name=$_POST['name'];
            $quantity=$_POST['quentity'];
            $date=$_POST['datee'];
            if(empty($id && $name && $quantity && $date))
                {
                    echo "<script>alert('fill this all field')</script>";
                    die();
                }
                else{

            $conn=mysqli_connect("localhost","root","","grocery");
            $q="update orderr set id='$id',name='$name',quantity='$quantity',datee='$date' where id='$id'";
            $qu=mysqli_query($conn,$q);
            if($qu)
            {
                echo "<script>alert('updated successfully')</script>";
            }
            else
            {
                echo "<script>alert('updated not successfully')</script>";
            }

       
        }
    }
        if(isset($_POST['view']))
        {
           header("Location:orderupdateview.php");
        }

    
    
    ?>