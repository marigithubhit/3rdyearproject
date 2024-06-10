<html>
    <head>
        <title>Billing</title>
</head>
<html>
    <head>
        <link rel="stylesheet" href="formdesign.css">
        <title>BILL LIST</title>
</head>
<style>
        .form-control{
            display:block;
            width:100%;
            padding: 0.375rem 0.75rem;
            font-size:1rem;
            font-weight:400;
            line-height:1.5s;
            color:#212529;
            background-color:#fff;
            background-clip:padding-box;
            border:1px solid #ced4da;
            -webkit-appearance:none;
            -moz-appearance:none;
            appearance:none;
            border-radius:0.25rem;
            transition:border-color 015s ease-in-out,box-shadow 0.15s ease-in-out;
        }
        </style>

<body>
    <!-- <form action="">
    <input type="text" name="search">
    <button type="submit" name="submit">Submit</button><br><br>
    </form> -->
    <div class="container">
        <div class="title">Bill List</div>
    <form action="" method="POST" align="center">
        <div class="user-details">
             <div class="input-box">
                <span class="details">customer id</span>
        <input type="number" name="idd"  value="<?php if(isset($_POST['idd'])) echo $_POST['idd']?>"><br><br>
        </div> 
        <div class="input-box">
        <span class="details">customer name</span>
        <input type="text" name="cname" pattern="[A-Za-z\s]*" title="only letters allowed" value="<?php if(isset($_POST['cname'])) echo $_POST['cname']?>"><br>
        </div>
        <div class="input-box">
            <span class="details">Customer mail</span>
        <input type="email" name="gmail"><br>
        </div>
        <div class="input-box">
        <span class="details">product id</span>

        <select name="pid" id="pid" class="form-control">
         <?php
             $conn=mysqli_connect("localhost","root","","grocery");
             $queryy="SELECT id,name from products";

             $query11=mysqli_query($conn,$queryy);
             while($rows=mysqli_fetch_assoc($query11))
             {
                $prod[$rows['id']]=$rows['name'];
                echo"<option value=$rows[id]>$rows[id]</option>";
             }
         ?> <br>
            </div>    
      </select>
       
      <div class="input-box">
          <span class="details">product name</span>
      <select name="pname" id="pname" class="form-control">
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
    <div class="input-box">
          <span class="details">category name</span>
      <select name="pname" id="pnam" class="form-control">
         <?php
             $conn=mysqli_connect("localhost","root","","grocery");
             $queryy="SELECT cat  from products";
             $query11=mysqli_query($conn,$queryy);
             while($rows=mysqli_fetch_array($query11))
             {
                echo"<option value=$rows[cat]>$rows[cat]</option>";
             }
         ?>
         </select>
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

       <div  class="input-box">
        <span class="details">Quantity</span>
        <input type="number" name="quantity" >
        </div>
        <div class="input-box">
            <span class="details">UNIT</span>
               <select name="unit" required class="form-control">
                  <option value="kg">kg</option>
                  <option value="g">G</option>
</select>
        <div class="input-box">
        <span class="details">Date</span>
        <input type="date"  name="cdate" min="<?php echo date("Y-m-d")?>"><br>
            </div>
            <div class="button" >
        <button type="submit" name="add">ADD</button>
        <button type="submit" name="generate">BILL</button>
        <button type="submit" name="mailbill">send mail</button>
            </div>
    
            </div>
        
</form>
</body>
</html>
<?php
    if($_POST)
    {
        $unit=$_POST['unit'];
        $idd=$_POST['idd'];
        $cname=$_POST['cname'];
        $cmail=$_POST['gmail'];
        $pid=$_POST['pid'];
        $pname=$_POST['pname'];
        $quantity=(int)$_POST['quantity'];
        $cdate=$_POST['cdate'];
     if(isset($_POST['generate']))
        {
           $conn=mysqli_connect("localhost","root","","grocery");
           $query="SELECT * from adddata where id='$idd'";
           $query1=mysqli_query($conn,$query);
           echo "<h1>BILL LIST</h1>";
           echo "<table border=2px><tr><th>customer id</th><th>product id</th><th>product name</th><th>quantity</th><th>cost</th><th>date</th></tr>";
           $s=0;
           while($rows=mysqli_fetch_array($query1))
           {
            echo "<tr><td>{$rows['id']}</td>";
            echo "<td>{$rows['idd']}</td>";
            echo "<td>{$rows['name']}</td>";
            echo "<td>{$rows['quantity']}</td>";
            echo "<td>{$rows['cost']}</td>";
            echo "<td>{$rows['dateee']}</td>";
            $s=$s+$rows['cost'];
           }
           echo "</table></center>";
           echo "<h1>TOTAL COST RS:$s</h1>";
        }
    if(isset($_POST['add']))
        {
         if(empty( $pid && $pname && $cname && $cmail && $quantity && $cdate))
         {
            echo "<script>alert('fill this all field')</script>";
            die();
         }
            $conn=mysqli_connect("localhost","root","","grocery");
            $q="SELECT * from products where name='$pname'";
            $qu=mysqli_query($conn,$q);
            $cost=0;
            while($rows=mysqli_fetch_array($qu))
            {
                $price=(int)$rows['price'];
                $stock=(int)$rows['stock'];
                $id=(int)$rows['id'];
                $name=$rows['name'];
                if($id==$pid && $name==$pname)
                {
                    if($stock  < $quantity)
                    {
                        echo '<script>alert("'.$stock.'")</script>';
                        die();
                    }
                    else{
                        if($unit=="kg")
                        {
                        $cost=$price * $quantity;
                        $newstock=$stock-($quantity*1000);
                        if($newstock<0)
                        {
                            echo "<script>alert('error')</script>";
                        }
                        else
                        {
                        $query1="update products set stock='$newstock' where name='$pname'";
                        $que=mysqli_query($conn,$query1);
                        }
                    }
                    else{
   
                        $cost=($price/1000)*$quantity;
                        $newstock=$stock-$quantity;
                        if($newstock<0)
                        {
                            echo "<script>alert('error');window.location.href='grocerybill.php'</script>";
                        }
                        else{
                            $query1="update products set stock='$newstock' where name='$pname'";
                            $que=mysqli_query($conn,$query1);
                        }
                    }
                        $conn1=mysqli_connect("localhost","root","","grocery");
                        $quer="INSERT INTO adddata values('$idd','$cname','$cmail',$pid,'$pname','$quantity','$cost','$cdate')";
                        $que=mysqli_query($conn1,$quer);
                        $c=$conn1=mysqli_connect("localhost","root","","grocery");
                        $q="insert into customer values('$idd','$cname','$cdate','$cost')";
                        $y=mysqli_query($c,$q);
                         if($que)
                         {
                            echo "inserted";
                        }
                        else{
                            echo "not inserted";
                        }
                         $query="select * from adddata where id='$idd'";
                        $query1=mysqli_query($conn1,$query);
                        echo "<h3>bill list<h3>";
                        echo "<center><table border=2px><tr><th>customer id</th><th>customer name</th><th>product quantity</th><th>cost</th><th>date</th><th colspan=2>Action</th></tr>";
                        $s=0;
                        while($rows=mysqli_fetch_array($query1))
                        {
                  
                           echo "<td>{$rows['id']}</td>";
                           echo "<td>{$rows['name']}</td>";
                           echo "<td>{$rows['quantity']}</td>";
                           echo "<td>{$rows['cost']}</td>";
                           echo "<td>{$rows['dateee']}</td>";
                           echo "<td><a href=billdelete.php?id={$rows['id']}>delete</a></td>";
                           echo "<td><a href=billupdate.php?id={$rows['id']}&&pid={$rows['idd']}>update</a></td></tr>";
                           $s=$s+$rows['cost'];
                        }                    
               echo "</table></center>";
               echo "<h1>Total cost RS:$s</h1>";
                    }
                }
                else{
                    echo "<script>alert('id or name mismatch')</script>";
                }
            }
        }
    }       
use PHPMailer\PHPMailer\PHPMailer;
if($_POST){
   
    $gmail=$_POST['gmail'];
    $name=$_POST['cname'];
    if(isset($_POST['mailbill']))
    {
        require 'C:\xampp\htdocs\PHPMailer 6.9.1 source code\PHPMailer-PHPMailer-2128d99\src\PHPMailer.php';
        require 'C:\xampp\htdocs\PHPMailer 6.9.1 source code\PHPMailer-PHPMailer-2128d99\src\Exception.php';
        require 'C:\xampp\htdocs\PHPMailer 6.9.1 source code\PHPMailer-PHPMailer-2128d99\src\SMTP.php';
        $mail=new PHPMailer(true);
        try{
            $mail->isSMTP();
            $mail->Host='smtp.gmail.com';
            $mail->SMTPATH=true;
            $mail->Username='marikumar@gmail.com';
            $mail->Password='gxcz xkgj jqnz eaib';
            $mail->SMTPSecure='tls';
            $mail->Port='587';
            $mail->isHTML(true);
            $mail->setFrom('marikumar@gmail.com','marikumar');
            $mail->addAddress("$gmail","$name");
            echo $gmail;
            $mial->Subject='BILL LIST';
            $mail->Body="bill list here:<br><br>";
            $conn=mysqli_connect("localhost","root","","grocery");
            $query="SELECT * from adddata where id='$iddd'";
            $query1=mysqli_query($conn,$query);
            $mail->Body.='<center><table border=2px><tr><th>customer id</th><th>product name</th><th>product id</th><th>quantity</th><th>cost</th><th>date</th></tr>';
            $s=0;
            while($rows=mysqli_fetch_array($query1))
            {
                $mail->Body.="<tr><td>{$rows['id']}</td>
                <td>{$rows['name']}</td>
                <td>{$rows['idd']}</td>
                <td>{$rows['quentity']}</td>
                <td>{$rows['cost']}</td>
                <td>{$rows['datee']}</td></tr>";
                $s=$s+$rows['cost'];
            }
            $mail->Body.="</table></center>
            <h1>Total Cost RS: $s</h1>";
            if($mail->send())
            {
                echo "mail send successfully";
            }
            else{
                echo "error";
            }
        }
        catch(Exception $e)
        {
            echo "error";
            echo $e->getmessage();
            echo $mail->ErrorInfo;
        }
    }
}
?>
<script>
    window.history.replaceState(null,null,window.location.href);
    </script>


