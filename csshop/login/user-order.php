<?php session_start(); 
    if ($_SESSION["role"] != "admin"){
        header("location: role.php");
    }
?>

<?php session_start(); ?>
<?php include "../connect.php"; ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>CS Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="mobile-web-app-capable" content="yes">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="../mcss.css" rel="stylesheet" type="text/css" />
    <script src="../mpage.js"></script>
    <style>
        article {
          text-align: center;
        }
        article>a {
            color: blue;
        }
        table, th, td {
            border: solid black 1px;
            margin: auto;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .order {
            margin-top: 20px;
            font-size: 18px;
        }
    </style>
  </head>

  <body>

    <header>
      <div class="logo">
        <img src="../cslogo.jpg" width="200" alt="Site Logo">
      </div>
      <div class="search">
        <form>
          <input type="search" placeholder="Search the site...">
          <button>Search</button>
        </form>
      </div>
    </header>

    <main>
        <article>
            <h1>รายกายคำสั่งซื้อของคุณ <?=$_GET["username"]?></h1>

            <?php
                $stmt = $pdo->prepare("SELECT orders.ord_id, ord_date, orders.status, item.pid, product.pname, price, item.quantity, 
                                    SUM(price * item.quantity) AS total
                                    FROM orders
                                    JOIN item ON orders.ord_id = item.ord_id
                                    JOIN product ON item.pid = product.pid
                                    WHERE orders.username = ?
                                    GROUP BY item.tid");

                $stmt->bindParam(1, $_GET["username"]);
                $stmt->execute(); 
            ?>
            <?php while ($row = $stmt->fetch()) { 
                if ($row["ord_id"] != $order_id && $order_id != null) { 
                    echo "</table>";
                }
                
                if ($row["ord_id"] != $order_id) { ?>
                    <div class="order">
                        <b>หมายเลขออเดอร์:</b> <?=$row["ord_id"]?> 
                        <b>วันที่:</b> <?=$row["ord_date"]?>
                        <b>สถานะ:</b> <?=$row["status"]?>
                    </div>
                    <table>
                        <tr>
                            <th>หมายเลขสินค้า</th>
                            <th>ชื่อสินค้า</th>
                            <th>ราคา</th>
                            <th>จำนวน</th>
                            <th>ยอดสุทธิ</th>
                        </tr>
            <?php }
                $order_id = $row["ord_id"];
            ?>
                    <tr>
                        <td><?=$row["pid"]?></td>
                        <td><?=$row["pname"]?></td>
                        <td><?=$row["price"]?></td>
                        <td><?=$row["quantity"]?></td>
                        <td><?=$row["total"]?> บาท</td>
                    </tr>
                
            <?php } 
                echo "</table>";
            ?>
        </article>

        <nav id="menu">
        <h2>Navigation</h2>
        <ul class="menu">
          <li><a href="../home.php">Home</a></li>
          <li><a href="../product.php">Products</a></li>
          <li><a href="../product-list.php">Products List</a></li>
          <li><a href="../add-product.html">Add Product</a></li>
          <li><a href="../mpage1.php">Workshop 1</a></li>
          <li><a href="../mpage2.php">Workshop 2</a></li>
          <li><a href="../mpage4.php">Workshop 4</a></li>
          <li><a href="../mpage7.php">Workshop 7</a></li>
          <li><a href="../mpage9.php">Workshop 9</a></li>
          <li><a href="../lab7.php">Lab 7</a></li>
          <li><a href="../ajax-json.html">AJAX-JSON</a></li>
        </ul>
      </nav>
      <aside>
        <h2>Aside</h2>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed blandit libero sit amet nunc ultricies, eu feugiat diam placerat. Phasellus tincidunt nisi et lectus pulvinar, quis tincidunt lacus viverra. Phasellus in aliquet massa. Integer iaculis massa id dolor venenatis scelerisque.
          <br><br>
        </p>
      </aside>
    </main>
    <footer>
      <a href="#">Sitemap</a>
      <a href="#">Contact</a>
      <a href="#">Privacy</a>
    </footer>
  </body>
</html>
