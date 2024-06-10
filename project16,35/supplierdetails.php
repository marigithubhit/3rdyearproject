<html>
    <head>
        <link rel="stylesheet" href="formdesign.css">
        <title>supplier details</title>
</head>
<body>
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
<div class="container">
            <div class="title">Supplier Details</div><br>
    <form action="" method="POST" align="center">
        <div class="user-details">
            <div class="input-box"> 
                <span class="details">First name</span>
       <!-- <input type="text" name="fname" pattern="[A-za-z\s]*" title="only letters allowed"><br></div> -->
       <select name="fname" id="fname" class="form-control">
        <?php
        $conn=mysqli_connect("localhost","root","","grocery");
        $queryy="SELECT * from supplier";
        $query11=mysqli_query($conn,$queryy);
        while($rows=mysqli_fetch_assoc($query11))
        {
            $prod[$rows['fname']]=$rows;
            echo "<option value=$rows[fname]>$rows[fname]</option>";
        }
        ?>
        </select><br>
       <div class="input-box">
        <span class="details">Last name</span>
       <input type="text" name="lname" id="lastname" pattern="[A-za-z\s]*" title="only letters allowed"></div>
       <div class="input-box">
        <span class="details">Phone</span>
       <input type="tel" name="phone" id="phone" minLength="10" maxLength="10" ><br></div>
       <div class="input-box">
        <span class="details">Email</span>
       <input type="email" name="email" id="email"><br></div>
       <div class="input-box">
        <span class="details">Department</span>
       <input type="text" name="department" id="department"pattern="[A-za-z\s]*" title="only letter allowed"><br></div>
       <div class="input-box">
        <span class="details">pname</span>
       <input type="text" name="pname" pattern="[A-za-z\s]*" title="only letter allowed"><br></div>
       <div class="input-box">
        <span class="details">Quantity</span>
       <input type="number" name="quantity" min="1"><br></div>
       <div class="input-box">
        <span class="details">Date</span>
       <input type="date" name="date" min="<?php echo date("Y-m-d")?>"><br></div>
</div>
    <div class="button" align="center">
       <button type="submit" name="order">ORDER</button><br>
       <button type="submit" name="view">VIEW</button><br>
       <button type="submit" name="sendemail">SEND EMAIL</button><br>
</div>
</div>
</form>
<script>
const prods=<?php echo json_encode($prod)?>;
const fname=document.getElementById("fname");
const lastname=document.getElementById("lastname");
const department=document.getElementById("department");
const phone=document.getElementById("phone");
const email=document.getElementById("email");
lastname.value=prods[fname.value].lname;
department.value=prods[fname.value].department;
phone.value=prods[fname.value].phone;
email.value=prods[fname.value].email;

fname.addEventListener("change",(e)=>{
    lastname.value=prods[fname.value].lname;
    department.value=prods[fname.value].department;
    phone.value=prods[fname.value].phone;
    email.value=prods[fname.value].email;
})
</script>
<?php 
if($_POST)
{
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $department=$_POST['department'];
    $pname=$_POST['pname'];
    $quantity=$_POST['quantity'];
    $date=$_POST['date'];
    if(isset($_POST['order']))
    {
        if(empty($fname && $lname && $phone && $email && $department && $pname && $quantity && $date))
        {
            echo "<script>alert('fill these all field')";
            die();
        }
        $conn=mysqli_connect("localhost","root","","grocery");
        $query1="insert into supplier values('$fname','$lname','$phone','$email','$department','$pname','$quantity','$date')";
        $query2=mysqli_query($conn,$query1);
        
        if($query2)
        {
            echo "<script>alert('inserted successfully')</script>";
        }
        else
        {
            "<script>alert('inserted not successfully')";
        }

    }
    if(isset($_POST['view']))
    {
        header("Location:supplierview.php");
    }
}
?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
$fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $department=$_POST['department'];
    $pname=$_POST['pname'];
    $quantity=$_POST['quantity'];
    $date=$_POST['date'];
    if(isset($_POST['sendemail']))
{
   require 'D:\xampp\htdocs\project16,35\project16,35\PHPMailer 6.9.1 sourcecode\PHPMailer-PHPMailer-2128d99\src\PHPMailer.php';
   require 'D:\xampp\htdocs\project16,35\project16,35\PHPMailer 6.9.1 sourcecode\PHPMailer-PHPMailer-2128d99\src\Exception.php';
   require 'D:\xampp\htdocs\project16,35\project16,35\PHPMailer 6.9.1 sourcecode\PHPMailer-PHPMailer-2128d99\src\SMTP.php';
   $mail=new PHPMailer(true);
   try{
    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->SMTPAuth=true;
    $mail->Username='marikumaroff@gmail.com';
    $mail->Password='gxcz xkgj jqnz eaib';
    $mail->SMTPSecure='tls';
    $mail->Port=587;
    $mail->isHTML(true);
    $mail->setFrom('marikumaroff@gmail.com','marikumar');
    $mail->addAddress("$email","$fname");
    echo $email;
    $mail->Subject='mj grocery store';
    $mail->Body="these product we need:<br><br>";
    $conn=mysqli_connect("localhost","root","","grocery");
    $query="SELECT department,pname,quantity,datee from supplier where lname='$lname'";
    $query1=mysqli_query($conn,$query);
    $mail->Body.='<center><table border=2px><tr><th>Department</th><th>product name</th><th>quantity</th><th>date</th></tr>';
    while($rows=mysqli_fetch_array($query1))
    {
        $mail->Body.="<tr><td>{$rows['department']}</td><td>{$rows['pname']}</td><td>{$rows['quantity']}</td><td>{$rows['date']}</td></tr>?";
    }
    $mail->Body.="</table></center>";
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

?>
<!-- <html>
    <form action="" method="POST">
        <button type="submit" name="home">HOME</button>
        <a href="#">TOP</a>
</form>
</html> -->
<?php
{
    if(isset($_POST['home']))
    {
        header("location:projecthome.php");
    }
}
?>

















