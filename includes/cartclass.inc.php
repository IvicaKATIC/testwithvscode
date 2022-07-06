<?php
require __DIR__ . '/dbconnection.inc.php';

class Cart extends Connection
{
    public function loadCart()
    {
        $sql = "SELECT * FROM cart ORDER BY product_price ASC";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        echo "<h4><table><tr><th>Produktname</th><th>Preis</th><th>Gekauft am</th></tr>";
        while ($cartdata = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                  <td>" . $cartdata['product_name'] . "</td>
                  <td>€ " . $cartdata['product_price'] . "</td>
                  <td>" . $cartdata['creation_date'] . "</td>
                  </tr>";
        }
        echo "</table></h4>";
    }
}