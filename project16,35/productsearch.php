<html>
<style>
        body{
            background-color:lightgrey;
            font-family:arial,sans-serif;
        }
        form{
            max-width:600px;
            margin:20px auto;
            }
        label{
            display:block;
            margin-bottom:8px;
        }
        input{
            width:50%;
            padding:8px;
            margin-bottom:16px;
            box-sizing:border-box;
        }
        button{
            background-color:#4caf50;
            color:white;
            padding:10px 15px;
            border:none;
            border-radius:4px;
            cursor:pointer;
        }
        button:hover{
            background-color:#45a049;
        }
        table{
          width: 100px;
            border-collapse:collapse;
            margin-top:20px;
        }
        th,td{
            padding:12px;
            text-align:center;
            border-bottom:5px solid #ddd;
        }
        th{
            background-color:#f2f2f2;
        }
        tr:hover{
            background-color:#f5f5f5;
        }
        .table #grem{
            background-color:brown;
            text-decoration:none;
            border-radius:40px;
            font-weight:bold;
            color:black;
            font-size:17px;
        }
        a{
            text-decoration:none;
        }
        </style>
        </html>
<?php
$likeee=$_POST['search'];
$conn=mysqli_connect("localhost","root","","grocery");
$query="SELECT * from products where name like '$likeee%'";
$query1=mysqli_query($conn,$query);
$affected=mysqli_affected_rows($conn);
if($affected < 1)
{
    echo"<script>alert('data not found')</script>";
    die();
}
else{
    echo "<center><table border=2px colspan=10><tr><th>product id</th><th>product name</th><th>product price</th><th>product stock</th><th>expire date</th></tr>";
    while($row=mysqli_fetch_array($query1))
    {
      echo"<tr><td>{$row['id']}</td>";
      echo"<td>{$row['name']}</td>";
      echo"<td>{$row['price']}</td>";
      echo"<td>{$row['stock']}</td>";
      echo"<td>{$row['edate']}</td></tr>";
    }
    echo "</table></center>";
}
?>