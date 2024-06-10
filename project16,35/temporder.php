<html>
    <head>
      <link rel="stylesheet" href="formdesign.css">
        <title>order list</title>
</head>
<body align="center">
            <?php
           
            ?>

              <div class="container" style="display:flex" >
                 <center> <div class="title">ORDER LIST</div></center><br>
            <form action="" method="POST" >
               <div class="user-details" >
                  <div class="input-box">
                <span class="details">Product id</span><br><br>
                <select name="iddd" id="pid">
                    <?php
                    $conn=mysqli_connect("localhost","root","","grocery");
                    $qry="SELECT id,name from products";
                    if($res=mysqli_query($conn,$qry))
                    {
                        while($result=mysqli_fetch_assoc($res))
                        {
                            $id=$result['id'];
                            $arr[$id]=$result['name'];
                            echo "<option value=$id>$id</option>";
                        }
                    }
         ?>
         </div>
            </select><br><br>
            
            <div class="input-box">
                <span class="details">Product name</span><br><br>
                <select name="name" id="pname">
         <?php
             $conn=mysqli_connect("localhost","root","","grocery");
             $query="SELECT name from products";
             $query1=mysqli_query($conn,$query);
             while($rows=mysqli_fetch_array($query1))
             {
                echo"<option value=$rows[name]>$rows[name]</option>";
             }
         ?>
           </select>
            </div>
    <br><br>
         
                     <div class="input-box">
                     <span class="details">quantity</span>
                  <input type="number" name="quentity" min="1"><br><br>
            </div>
               <div class="input-box">
                  <span class="date">DATE</span>
                  <input type="date" name="datee" min="<?php echo date('Y-m-d')?>"><br><br>
            </div>
            </div>
            <div class="button" align="center">
                <button type="submit" name="order">ORDER</button><br>
                <button type="submit" name="view">View</button>
            </div>
        </form>
            </div>
        </body>
        </html>
        <?php
        if($_POST)
        {
          $id=$_POST['iddd'];
          $name=$_POST['name'];
          $quentity=$_POST['quentity'];
          $date=$_POST['datee'];
          
          if(isset($_POST['order']))
          {
            if(empty($id && $name && $quentity && $date))
            {
                echo "<script>alert('fill this all field')</script>";
                die();
                $conn=mysqli_connect("localhost","root","","grocery");
                $query="SELECT * from products";
                $query1=mysqli_query($conn,$query);
                while($res=mysqli_fetch_array($query1))
                {
                    $idd=$res['id'];
                    $namee=$res['name'];
                }
                if($id == $idd && $name==$namee)
                {
                    echo "<script>alert('product id,order id or productname,ordername  mismatch')";
                }
            }
            else{
            $conn=mysqli_connect("localhost","root","","grocery");
            $q="INSERT INTO orderr values('$id','$name','$quentity','$date')";
            $qu=mysqli_query($conn,$q);
            $up="update products set stock=stock+$quentity where name='$name'";
            $que=mysqli_query($conn,$up);
            if($que)
            {
                echo "<script>alert('order booking successfully')</script>";
            }
            else{
                echo "<script>alert('order not booked')</script>";
            }
        }
      }
        if(isset($_POST['view']))
        {
         header("location:orderview.php");
        }
}
        
        ?>
            