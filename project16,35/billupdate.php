<?php
if(isset($_GET['id']))
{
    $id=(int)$_GET['id'];
    $pid=(int)$_GET['pid'];
    $conn=mysqli_connect("localhost","root","","grocery");
    $query1="SELECT * from adddata where id=$id and idd=$pid ";
    $qu=mysqli_query($conn,$query1);
    while($res=mysqli_fetch_array($qu))
    {
        $quantity=$res['quantity'];
        $id=$res['id'];
        $cname=$res['cname'];
        $cmail=$res['cmail'];
        $idd=$res['idd'];
        $name=$res['name'];
        $cost=$res['cost'];
        $dateee=$res['dateee'];
    }
}
?>
<html>
    <head>
        <title>Billing</title>
</head>
       <link rel="stylesheet" href="formdesign.css">
<body>
    <!-- <form action="">
    <input type="text" name="search">
    <button type="submit" name="submit">Submit</button><br><br>
    </form> -->
    <div class="container">
        <div class="title">BIll UPDATE</div>

    <form action="" method="POST" align="center">
        <div class="input-box">
            <span class="details">customer Id</span>
        <input type="number" name="idd" value="<?php echo $id;?>"><br><br>
</div>
<div class="input-box">
<span class="details">customer Name</span>
     <input type="text" name="cname" value="<?php echo $cname;?>"><br><br>
</div>
   <div class="input-box">
    <span class="details">customer mail</span>
       <input type="email" name="gmail" value="<?php echo $cmail;?>"><br><br>
</div>
<div class="input-box">
    <span class="details">product id</span>
     
        <select name="pid" id="pid" value="<?php echo $idd;?>">
         <?php
             $conn=mysqli_connect("localhost","root","","grocery");
             $queryy="SELECT id,name from products
             ";
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
    <span class="details">product name</span>
        <select name="pname"  id="pname" value="<?php echo $name?>">
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
        <input type="text" name="quantity" value="<?php echo $quantity;?>"><br><br>
            </div>
            <div class="input-box">
    <span class="details">Date</span>
        <input type="date"  name="cdate" value="<?php echo $dateee;?>"><br><br>
            </div>
            <div class="button" align="center">
        <button type="submit" name="add">ADD</button>
        <button type="submit" name="generate">BILL</button>
        <button type="submit" name="mailbill">send mail</button>
            </div>
</form>
      
</body>
            </div>  
</html>
<?php
    if($_POST)
    {
        $idddd=(int)$_POST['idd'];
        $cname=$_POST['cname'];
        $pid=(int)$_POST['pid'];
        $pname=$_POST['pname'];
        $cmail=$_POST['gmail'];
        $quantity=(int)$_POST['quantity'];
        $cdate=$_POST['cdate'];
        echo $idddd.$cname.$pid.$pname.$cmail.$quantity.$cdate;
     if(isset($_POST['generate']))
        {
           $conn=mysqli_connect("localhost","root","","grocery");
           $query="SELECT * from adddata where id='$idddd'";
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
         if(empty( $quantity))
         {
            echo "<script>alert('fill quantity field')</script>";
            die();
         }
            $conn=mysqli_connect("localhost","root","","grocery");
            $q="SELECT * from products where name='$pname'";
            $qu=mysqli_query($conn,$q);
            $cost=0;
mysqli_report(MYSQLI_REPORT_ERROR);
            while($rows=mysqli_fetch_array($qu))
            {
                $price=(int)$rows['price'];
                $stock=(int)$rows['stock'];
                $i=(int)$rows['id'];
                $nam=$rows['name'];
                if($i==$pid && $nam==$pname)
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
                        $quer="update adddata set cname='$cname',cmail='$cmail',idd=$pid,name='$pname',quantity=$quantity,cost=$cost,dateee='$cdate' where idd=$pid";
                        //$quer ="update adddata set cname='mari' where id=$idddd";
                        
                        $quee=mysqli_query($conn1,$quer);
                        if($quee)
                        {
                            echo "updated";
                        }
                        else
                        {
                            echo "not updated";
                        }
                        $query="select * from adddata where id='$idddd'";
                        $query1=mysqli_query($conn,$query);
                        
                        echo "<center><table border=2px><tr><th>customer id</th><th>product id</th><th>product name</th><th>quantity</th><th>cost</th><th>Date</tr>";
                        $s=0;
                        
                        while($rows=mysqli_fetch_array($query1))
                        {
                
                           echo "<tr><td>{$rows['id']}</td>";
                           echo "<td>{$rows['idd']}</td>";
                           echo "<td>{$rows['name']}</td>";
                           echo "<td>{$rows['quantity']}</td>";
                           echo "<td>{$rows['cost']}</td>";
                           echo "<td>{$rows['dateee']}</td>";
                           echo "</tr>";
                           $s=$s+$rows['cost'];
                        }                    
               echo "</table></center><br><br>";
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
     
?>