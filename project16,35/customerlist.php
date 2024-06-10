<html>
    <head>
        <link rel="stylesheet" href="formdesign.css">
        <title>urgently needed product</title>
</head>
  <style>
   #mari{
      width:500px;
      margin-left:42px;
   }
   </style>
    <body>
          <div class="container">
            <div class="title">Customer details</div>
               <form action="" method="post">
               <div class="user-details">
               <div class="input-box">
               <input type="text" name="search">
               </div>
                 <div class="button">
                <button type="submit" name="sub" style="height:45px;width:100px;margin-top:20px;margin-right:200px">Search</button><br>
                 </div>
</form>
                 <form action="" method="POST" align="center">
                 <div class="input-box">
                  <span class="details">From</span>
                 <input type="date" name="from"><br><br>
                 </div>
                 <div class="input-box">
                  <span class="details">To</span>
                <input type="date" name="to"><br><br>
                 </div>
                 <div class="button" style="display:flex;">
                <button type="submit" name="check">Check</button>
                <button type="submit" id="mari" name="list" >Customer list</button>
               </div>
</div>
        </form>
            </body>
        </html>
        <?php
        if(isset($_POST['list']))
        {
            $from=$_POST['from'];
            $to=$_POST['to'];
            $conn=mysqli_connect("localhost","root","","grocery");
            $c="SELECT * FROM customer";
            $q=mysqli_query($conn,$c);
            echo "<h2>customer list</h2>";
            echo "<center><table border=2px><tr><th>customer id </th><th>customer name</th><th> amount</th><th> date</th></tr>";
            while($res=mysqli_fetch_array($q))
            {
                echo "<tr><td>{$res['id']}</td>";
                echo "<td>{$res['name']}</td>";
                echo "<td>{$res['amount']}</td>";
                echo "<td>{$res['date']}</td>";
            } 
            echo "</tabel></center>";
        }
        if(isset($_POST['check']))
        {
            $from=$_POST['from'];
            $to=$_POST['to'];
            $con=mysqli_connect("localhost","root","","grocery");
            $q="SELECT * FROM customer where date BETWEEN '$from' AND '$to'";
            $w=mysqli_query($con,$q);
            echo "<table border=2px><tr><td>customer id</td><td>customer name</td><td>customer amount</td><td>customer date</td></tr>";
            $a=0;
            while($res=mysqli_fetch_array($w))
            {
            echo "<tr><td>{$res['id']}</td>";
            echo "<td>{$res['name']}</td>";
            echo "<td>{$res['amount']}</td>";
            echo "<td>{$res['date']}</td></tr>";
            $a=$a+$res['amount'];
            }
        echo "</table></center><br><br>";
        echo "<center><h6>TOTAL COST  .$a.  <h6></center>";

        }
         if(isset($_POST['sub']))
         {
        $likeee=$_POST['search'];
            $conn=mysqli_connect("localhost","root","","grocery");
            $query="SELECT * FROM customer where name like '%$likeee%'";
            $query1=mysqli_query($conn,$query);
            $affected=mysqli_affected_rows($conn);
             if($affected < 1)
            {
                echo "Data not found";
                die();
           }
            else{
                 echo "<center><table border=2px><tr><td>customer id</td><td>customer name</td><td>customer amount</td><td>customer date</td></tr>";
               while($row=mysqli_fetch_array($query1))
                 {
                     echo "<tr><td>{$row['id']}</td>";
                    echo "<td>{$row['name']}</td>";
                     echo "<td>{$row['amount']}</td>";
                     echo "<td>{$row['date']}</td></tr>";
                }
                 echo "</table></center>";
              }
             }
        
            ?>
