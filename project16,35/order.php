<html>
    <head>
      <link rel="stylesheet" href="formdesign.css">
        <title>order list</title>
        <!-- <link rel="stylesheet" href="../Bootstrap/css/bootstrap.min.css"> -->
</head>
<style>
    .form-control {
  display: block;
  width: 100%;
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  font-weight: 400;
  line-height: 1.5;
  color: #212529;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #ced4da;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  border-radius: 0.25rem;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
</style>
<body>
            <?php
           
            ?>

              <div class="container"  >
                 <div class="title">ORDER LIST</div><br>
            <form action="" method="POST" >
               <div class="user-details" >
                  <div class="input-box">
                <span class="details">Product id</span><br><br>
                <select name="iddd" id="pid" class="form-control">
         <?php
             $conn=mysqli_connect("localhost","root","","grocery");
             $queryy="SELECT id,name from products";
             $query11=mysqli_query($conn,$queryy);
             while($rows=mysqli_fetch_array($query11))
             {
                $prod[$rows['id']]=$rows['name'];
                echo"<option value=$rows[id]>$rows[id]</option>";
             }
         ?> 
      
            </select><br><br>
            </div>
            
            <div class="input-box">
                <span class="details">Product name</span><br><br>
                <select name="name" id="pname" class="form-control">
         <?php
             $conn=mysqli_connect("localhost","root","","grocery");
             $query="SELECT name from products";
             $query1=mysqli_query($conn,$query);
             while($rows=mysqli_fetch_array($query1))
             {
                echo"<option value=$rows[name]>$rows[name]</option>";
             }
         ?>
         
          
      </select><br><br>
      </div>
      <script>
    const prods=<?php echo json_encode($prod) ?>;
    console.log(prods);
    const pids=document.getElementById("pid");
    const pnames=document.getElementById("pname");
    console.log(pids);
    console.log(pnames);
    pids.addEventListener("change",(e)=>{
        pnames.value=prods[e.target.value];
    })
    
   
</script>
         
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
            