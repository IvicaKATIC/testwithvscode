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
        $sql = "SELECT * FROM product";
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
        $sql = "SELECT * FROM product WHERE id = $product_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$product_id]);

        $name = $product_id['name'];
        $price = $product_id['price'];

        $sql = "INSERT INTO cart (name,price) VALUES (?,?)";
        $stmt = $this->connect()->query($sql);
        $stmt->execute([$name, $price]);
        echo '<h4>Das Produkt wurde erfolgreich hinzugefügt!</h4>';
    }
}
