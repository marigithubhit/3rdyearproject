<?php
use PHPMailer\PHPMailer\PHPMailer;
if($_POST){
    $iddd=$_POST['idd'];
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
<html>
    <form action="" method="POST">
        <button type="submit" name="home">HOME</button>
        <a href="#">TOP</a>
</form>
</html>
<?php
{
    if(isset($_POST['home']))
    {
        header("location:");
    }
}
?>
