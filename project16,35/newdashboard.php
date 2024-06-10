<html>
<head>
    <title>Dashboard</title>
<link rel="stylesheet" href="Dashboard.css">
</head>

<body>
    <div class="sidebar">
        <div class="main">
            <ul class="menu">
            <li>
                <a href="#" class="active">
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="stock.php">
                    <span>Stock</span>
                </a>
            </li>
            <li>
                <a href="orginalcategory.php">
                    <span>Category</span>
                </a>
            </li>
            <li>
                <a href="productlistee.php" >
                    <span>Product</span>
                </a>
            </li>
            <li>
                <a href="order.php" >
                    <span>Order</span>
                </a>
            </li>
            <li>
                <a href="customerlist.php" >
                    <span>Customer</span>
                </a>
            </li>
            <li>
                <a href="grocerybill.php" >
                    <span>Bill</span>
                </a>
            </li>
            
            
            <li>
                <a href="employeedetails.php" >
                    <span>employee</span>
                </a>
            </li>
            <li>
                <a href="supplierdetails.php" >
                    <span>supplier</span>
                </a>
            </li>
            <li>
                <a href="urgently.php" >
                    <span>urgently</span>
                </a>
            </li>
           
            <li>
                <a href="homedesign.html" >
                    <span>Log out</span>
                </a>
            </li>

            </ul>
        </div>
        </div>
        <div class="main--content">
            <div class="header--wrapper" style="align-items:center">
                <div class="header--title">
                   <span>Primary</span>
                   <h2>Dashboard</h2>
                   
                </div>
            </div>

            <!-- <div class="user-info">
                <div class="searh--box">
                    <input type="text" name="search" placeholder="search">
                </div>
</div>

             -->

        <div class="Today--sales">
            <h3 class="main--title">Today Sales</h3>
        <div class="Today--wrapper">
            <div class="amount">
                <span class="title">Sales Amount</span>
                <span class="amount">
                    <?php 
                    $date=date("Y-m-d");
                    $conn=mysqli_connect("localhost","root","","grocery");
                    $qa="SELECT amount as co from customer where date='$date'";
                    $qua=mysqli_query($conn,$qa);
                    $s=0;
                    while($res=mysqli_fetch_array($qua))
                    {
                        $s=$s+$res['co'];
                    }
                    echo "<h3>RS:</h3><h1>$s</h1>";
                    ?></span>
                </span>
                <span class="Numbers">****</span>
            </div>
        </div>
        </div><br><br><br>
        <div class="Today--sales">
            <h3 class="main--title">Total Product</h3>
        <div class="Today--wrapper">
            <div class="amount">
                <span class="title">Number of Products</span>
                <span class="amount"><?php
                    $conn=mysqli_connect("localhost","root","","grocery");
                    $q="SELECT count(id) as co from products";
                    $qu=mysqli_query($conn,$q);
                    while($res=mysqli_fetch_array($qu))
                    {
                        echo "<center><h1>{$res['co']}</center></h1>";
                    }
                    ?></span>
                <span class="Numbers">****</span>
            </div>
        </div>
        </div><br><br><br>
        <div class="Today--sales">
            <h3 class="main--title">Total Category</h3>
        <div class="Today--wrapper">
            <div class="amount">
                <span class="title">Number of Category</span>
                <span class="amount"> <?php
        $conn=mysqli_connect("localhost","root","","grocery");
        $q="SELECT count(id) as c from category";
        $qu=mysqli_query($conn,$q);
        while($res=mysqli_fetch_array($qu))
        {
            echo "<center><h1>{$res['c']}</center></h1>";
        }
        ?></span>
                <span class="Numbers">****</span>
            </div>
        </div>
        </div>
        </div>
        </body>
        </html>