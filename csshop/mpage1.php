<?php include "connect.php" ?>
<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>CS Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="mobile-web-app-capable" content="yes">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="mcss.css" rel="stylesheet" type="text/css" />
    <script src="mpage.js"></script>
  </head>

  <body>

    <header>
      <div class="logo">
        <img src="cslogo.jpg" width="200" alt="Site Logo">
      </div>
      <div class="search">
        <form>
          <input type="search" placeholder="Search the site...">
          <button>Search</button>
        </form>
      </div>
    </header>

    <div class="mobile_bar">
      <a href="#"><img src="responsive-demo-home.gif" alt="Home"></a>
      <a href="#" onClick='toggle_visibility("menu"); return false;'><img src="responsive-demo-menu.gif" alt="Menu"></a>
    </div>

    <main>
      <article>
        <?php
            $stmt = $pdo->prepare("SELECT * FROM product ORDER BY pid");
            $stmt->execute();

            echo "<table border='1px solid black' style='margin: auto; margin-top: 50px;'>";
            echo "<tr>
                <th>รหัสสินค้า</th>
                <th>ชื่อสินค้า</th>
                <th>รายละเอียด</th>
                <th>ราคา</th></tr>";
            
            while ($row = $stmt->fetch()) {
                echo "<tr>" . 
                "<td>" . $row["pid"] . "</td>" . 
                "<td>" . $row["pname"] . "</td>" . 
                "<td>" . $row["pdetail"] . "</td>" . 
                "<td>" . $row["price"] . " บาท</td>" . "</tr>";
            }
            echo "</table>";
        ?>
      </article>
      <nav id="menu">
        <h2>Navigation</h2>
        <ul class="menu">
          <li><a href="./home.php">Home</a></li>
          <li><a href="./product.php">Products</a></li>
          <li><a href="./product-list.php">Products List</a></li>
          <li><a href="./add-product.html">Add Product</a></li>
          <li class="dead"><a>Workshop 1</a></li>
          <li><a href="./mpage2.php">Workshop 2</a></li>
          <li><a href="./mpage4.php">Workshop 4</a></li>
          <li><a href="./mpage7.php">Workshop 7</a></li>
          <li><a href="./mpage9.php">Workshop 9</a></li>
          <li class="dead"><a>Lab 7</a></li>
          <li><a href="./ajax-json.html">AJAX-JSON</a></li>
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