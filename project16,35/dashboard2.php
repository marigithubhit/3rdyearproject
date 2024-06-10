<!DOCTYPE html>
<head>
    <title>Home dashboard</title>
</head>
<body>
    <header>
        <h1>Grocery Store</h1>
    </header>
    <div class="container">
    <aside>
        <ul>
            <li><a href="stocklist.php">Stock</a></li>
            <li><a href="category.php">category</a></li>
            <li><a href="order.php">order</a></li>
            <li><a href="mebill.php">mebill</a></li>
            <li><a href="customer.php">Customer</a></li>
            <li><a href="urgently.php">urgently</a></li>
        </ul>
    </aside>
    <main>
        <section id="dashboard">
            <h2>Today sales</h2>
            <p>
            
            </p>
        </section>
        <section id="Dashboard2">
            <h2>Total product</h2>
            <p>
            <?php
            $conn=mysqli_connect("localhost","root","","grocery");
            $q="SELECT count(id) as co from products";
            $qu=mysqli_query($conn,$q);
            while($res=mysqli_fetch_array($qu))
            {
                echo "<center><h1>{$res['co']}</center></h1>";
            }
            ?>
            </p>
        </section>
        <section id="dashboard 3">
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
    </main>
    </div>
<style>
    body{
        margin:0;
        padding:0;
        font-family:Arial,Helvetica,sans-serif;
    }
    header{
        background-color:#333;
        color:white;
        text-align:center;
    }
    .container{
        display:flex;
    }
    aside{
        width: 20px;
        background-color:#f4f4f4;
        padding:1rem;
    }
    ul{
        list-style: none;
        padding: 0;
    }
    li{
        margin-bottom: 1em;
        padding:15px;
    }
    a{
        text-decoration:none;
        color:#333;
        font-weight:bold;
        transition:color 0.3s ease-in-out;
    }
    a:hover{
        color:#555;
    }
    main{
        flex-grow:1;
        padding:1em;
        justify-content:space-evenly;
        display:flex;
    }
    </style>
    </body>
</html>
