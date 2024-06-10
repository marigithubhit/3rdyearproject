<html>
    <body>
<style>
        body{
            background-color:;
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
            width:100%;
          
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
    </body>
<form action=""  method="POST">
<label>category id<label>
<input type="text" name="id" value="<?php if(isset($_POST['id']))echo $_POST['id'];?>"><br><br>
    <label>category name</label><input type="text" name="name" value="<?php if(isset($_POST['name']))echo $_POST['name'];?>"><br><br>
    <button type="submit" name="add">ADD</button>
    <button type="submit" name="view">VIEW</button>
</form>
</html>
<?php
  mysqli_report(MYSQLI_REPORT_ERROR);
if($_POST)
{
    $id=$_POST['id'];
    $name=$_POST['name'];
   if(isset($_POST['search']))
    {
         header("categorysearch.php");
     }
    if(isset($_POST['add']))
    {
        $id=(int)$_POST['id'];
        $name=$_POST['name'];
        if(empty($id && $name))
        {
            echo "<script>alert('Fill this two field')</script>";
            die();
            
        }
        // $conn=mysqli_connect("localhost","root","","grocery");
        // $select="SELECT * from category";
        // $select1=mysqli_fetch_array($conn,$select);
        // while($rows=mysqli_fetch_array($select1))
        // {
        //     $idd=$rows['id'];
        //     $namee=$rows['name'];
        // }
        // if($id == $idd or $name=$namee)
        // {
        //     echo "<script>alert('already exist')</script>";
        //     die();
        // }
        $conn=mysqli_connect("localhost","root","","grocery");
       
        $que="INSERT INTO category values($id,'$name')";
        $q=mysqli_query($conn,$que);
        if($q)
        {
            echo "<script>alert('inserted')</script>";
        }
        else{
            echo "<script>alert('not inserted')</script>";
        }
    }
    if(isset($_POST['view']))
    {
        $conn=mysqli_connect("localhost","root","","grocery");
        $query="SELECT * from category";
        $query1=mysqli_query($conn,$query);
        echo "<center><table border=2px><tr><th>category Id</th><th>category name</th><th colspan=2>Action</th></tr>";
        while($row=mysqli_fetch_array($query1))
        {
            echo "<tr><td>{$row['id']}</td>";
            echo "<td>{$row['name']}</td>";
            echo "<td><div class=table><a id=gren href=cateo.php?id={$row['id']}>update</a></td>";
            echo "<td><a id=red href=categorydelete.php?id={$row['id']}>delete</a></td></tr></div>";
        }
        echo "</table></center>";
    }
}
?>
<html>
    <form action="" method="POST">
    <button type="submit" name="home">HOME</button>
    <a href="#">TOP</a>
</form>
</html>