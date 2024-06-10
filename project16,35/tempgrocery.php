<html>
    <head>
        <title>Billing</title>
</head>
<html>
    <head>
        <link rel="stylesheet" href="formdesign.css">
        <title>BILL LIST</title>
</head>

<body>
    <div class="container">
        <div class="title">Bill List</div>
    <form action="" method="POST" align="center">
        <div class="user-details">
             <div class="input-box">
                <span class="details">customer id</span>
        <input type="number" name="iddd" value="<?php if(isset($_POST['idd'])) echo $_POST['idd']?>"><br><br>
        </div> 
        <div class="input-box">
        <span class="details">customer name</span>
        <input type="text" name="cname" value="<?php if(isset($_POST['cname'])) echo $_POST['cname']?>"><br>
        </div>
        <div class="input-box">
            <span class="details">Customer mail</span>
        <input type="email" name="gmail"><br>
        </div>
        <div class="input-box">
        <span class="details">product id</span>
        <select name="pid">
         <?php
             $conn=mysqli_connect("localhost","root","","grocery");
             $queryy="SELECT id from products";
             $query11=mysqli_query($conn,$queryy);
             while($rows=mysqli_fetch_array($query11))
             {
                echo"<option value=$rows[id]>$rows[id]</option>";
             }
         ?> <br>
            </div>    
      </select>
       
      <div class="input-box">
          <span class="details">product name</span>
      <datalist id="value" name="pname">
         <?php
             $conn=mysqli_connect("localhost","root","","grocery");
             $query="SELECT name from products";
             $query1=mysqli_query($conn,$query);
             while($rows=mysqli_fetch_array($query1))
             {
                echo"<option value=$rows[name]>$rows[name]</option>";
             }
         ?>
         </div>
</datalist>
<input list="value" name="pname">
       <div  class="input-box">
        <span class="details">Quantity</span>
        <input type="text" name="quantity">
        </div>
        <div class="input-box">
        <span class="details">Date</span>
        <input type="date"  name="cdate" min="yyyy-mm-dd"><br>
            </div>
            <div class="button">
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
       $iddd=$_POST['idd'];
        $cname=$_POST['cname'];
        $pid=$_POST['pid'];
        $pname=$_POST['pname'];
        $quantity=(int)$_POST['quantity'];
        $cdate=$_POST['cdate'];
     if(isset($_POST['generate']))
        {
           $conn=mysqli_connect("localhost","root","","grocery");
           $query="SELECT * from adddata where id='$iddd'";
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
         if(empty( $pid && $pname && $quantity && $cdate))
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
                $idd=(int)$rows['id'];
                $name=$rows['name'];
                if($idd==$pid && $name==$pname)
                {
                    if($stock  < $quantity)
                    {
                        echo "<script>alert('stock not available')</script>";
                        die();
                    }
                    else{
                        $cost=$price * $quantity;
                        $newstock=$stock-$quantity;
                        $query1="update products set stock='$newstock' where name='$pname'";
                        $que=mysqli_query($conn,$query1);
                        $conn1=mysqli_connect("localhost","root","","grocery");
                        $quer="INSERT INTO adddata values('$iddd',$pid,'$pname','$quantity','$cost','$cdate')";
                        $que=mysqli_query($conn1,$quer);
                        $query="select * from adddata where id='$iddd'";
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
                           echo "<td><a href=billupdate.php?id={$rows['id']}>update</a></td></tr>";
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
   $iddd=$_POST['iddd'];
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


