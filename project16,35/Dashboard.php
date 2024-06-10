<html>
    <head>
        <title>Dashboard</title>
    </head>
    <body>
        <header>
            <h1>Grocery</h1>
        </header>
        <style>
            body{
                margin: 0;
                padding: 0;
                font-family:cursive;
                
            }
            header{
              background-color:black;
              color:white;
              text-align:center;
              padding:10px;        
                }
            .slidebar{
                background-color:black;
                color: white;
                width:200px;
                height:100vh;
                padding-top: 20px;
                position: fixed;
            }
            .slidebar li{
                padding: 10px;
            }
            .slidebar a{
                text-decoration: none;
                color: white;
            }
            .content{
                margin-left: 220px;
                padding: 30px;
            }
            .mainbox{
                display: flex;
                justify-content: space-around;
                position: relative;
                padding:40px;
                left:100;
            }
            .mainbox2{
                display: flex;
                justify-content: space-around;
                position:relative;
                padding:40px;
                left:100;
            }
            .box
            {
                background-color: grey;
                height:50px;
                width:100px; 
                padding:40px;
                left:300;
                top:150;
                justify-content: space-evenly;

            }
            .box1
            {
                background-color:;
                height:100px;
                width:100px;
                padding:40px;
             
                left:600;
                top:150;  
                justify-content: space-evenly;
            }
            .box2
            {
                background-color:;
                height:100px;
                width:100px;
                padding:40px;
              
                left:900;
                top:150;
                justify-content: space-evenly;   
            }
            .box3
            {
                background-color:;
                height:100px;
                width:100px;
                padding:40px;
              
                left:400;
                top:180;
                justify-content: space-evenly;  
            }
            .box4{
                background-color:grey;
                height:100px;
                width:100px;
                padding:40px;
                left:500;
                top:180;
            }
        </style>
        <aside class="slidebar">
            <ul>
            <li><a href="stock.php">stock</a></li>
            <li><a href="categoryid.php">category</a></li>
            <li><a href="productlistee.php">product</a></li>
            <li><a href="orderlist.php">order</a></li>
            <li><a href="customerlist.php">customer</a></li>
            <li><a href="Bill.php">Billing</a></li>
            </ul>
        </aside>
        <div class="mainbox">
        <div class="box">
      </div>
      <div class="box1">
      <h2>Total product</h2>
        <?php
        $conn=mysqli_connect("localhost","root","","grocery");
        $q="SELECT count(id) as co from products";
        $qu=mysqli_query($conn,$q);
        while($res=mysqli_fetch_array($qu))
        {
            echo "<center><h1>{$res['co']}</center></h1>";
        }
        ?>
    </div>
    <div class="box2">
    <h2>Total category</h2>
        <?php
        $conn=mysqli_connect("localhost","root","","grocery");
        $q="SELECT count(id) as c from products";
        $qu=mysqli_query($conn,$q);
        while($res=mysqli_fetch_array($qu))
        {
            echo "<center><h1>{$res['c']}</center></h1>";
        }
        ?>
    </div>
    </div>
    <div class="mainbox2">
    <div class="box3">
    </div>
    <div class="box4"></div>
    </div>
    </body>
</html>