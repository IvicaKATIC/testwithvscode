<?php
require __DIR__ . '/dbconnection.inc.php';

class Product extends Connection
{
    public function createProduct($data)
    {
        $pname = $data['pname'];
        $description = $data['description'];
        $price = $data['price'];

        try {
            $sql = "INSERT INTO product (name,description,price) VALUES (?,?,?)";
            $stmt =  $this->connect()->prepare($sql);
            $stmt->execute([$pname, $description, $price]);
            echo '<h2>Erfolgreich erstellt!</h2>';
            header("Refresh:1; url=createproduct.php");
        } catch (PDOException $e) {
            echo "Fehler beim erstellen des Produktes:" . $e->getMessage();
        }
    }

    public function loadAllProducts()
    {
        $sql = "SELECT * FROM product ORDER BY price ASC";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        echo "<h4><table><tr><th>Name</th><th>Beschreibung</th><th>Preis</th><th>Zum Warenkorb hinzufügen</th></tr>";
        while ($produktdata = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                  <td>" . $produktdata['name'] . "</td>
                  <td>" . $produktdata['description'] . "</td>
                  <td>€ " . $produktdata['price'] . "</td>
                  <td><form action='' method='POST'><button type='submit' name='cartbtn' value='" . $produktdata['id'] . "'>Hinzufügen</button></form></td>
                  </tr>";
        }
        echo "</table></h4>";
    }

    public function addToCart($product_id)
    {
        try {
            $sql = "SELECT * FROM product WHERE id = ? ";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$product_id]);
            $res = $stmt->fetch();
            
            
            $pid = $res['id'];
            $name = $res['name'];
            $price = $res['price'];
            $userid = $_SESSION['uid'];
            
            $sqli = "INSERT INTO cart (product_id, product_name, product_price, user_id) VALUES (?,?,?,?)";
            $stmt = $this->connect()->prepare($sqli);
            $stmt->execute([$pid, $name, $price, $userid]);
            $res1 = $stmt->fetch();
            print_r($res1);
            echo '<h4>Das Produkt wurde erfolgreich hinzugefügt!</h4>';
            header("Refresh:1; url=productlist.php");
        } catch (PDOException $e) {
            echo "Fehler beim hinzufügen des Produktes:  " . $e->getMessage();
        }
    }
}
