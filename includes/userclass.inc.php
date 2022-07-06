<?php
require __DIR__ . '/dbconnection.inc.php';

class User extends Connection
{

    public function signup($data)
    {
        $uname = $data['uname'];
        $email = $data['email'];
        $pw = sha1($data['pw']);
        $pw2 = sha1($data['pw2']);

        if ($pw === $pw2) {
            $sql = "SELECT * FROM user WHERE username = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$uname]);

            if ($stmt->rowCount() == 0) {
                $sql = "INSERT INTO user (username, email, password) VALUES (?, ?, ?)";
                $stmt =  $this->connect()->prepare($sql);
                $stmt->execute([$uname, $email, $pw]);
                echo '<h4>Erfolgreich registriert, du wirst in Kürze weitergeleitet!</h4>';
                header("Refresh:1; url=login.php");
            } else {
                throw new Exception('<h4>Username bereits vergeben!</h4>');
            }
        } else {
            throw new Exception('<h4>Passwörter stimmen nicht überein!</h4>');
        }
    }

    public function login($uname, $pw)
    {
        $sql = "SELECT * FROM user WHERE Username = ? AND Password = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$uname, $pw]);
        $userdefiniton = $stmt->fetch();

        if ($stmt->rowCount() == 1) {
            session_start();
            $_SESSION['uid'] = $userdefiniton['user_id'];
            $_SESSION['uname'] = $uname;
            $_SESSION['loggedin'] = true;
            $_SESSION['userrole'] = $userdefiniton['userrole'];
            header("Refresh:0; url=forward.php");
        }
    }

    public function showAllUsers()
    {
        $sql = "SELECT * FROM user";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        echo "<h4>
        <table>
        <tr>
        <th>Username</th>
        <th>Email</th>
        <th>Userrolle</th>
        <th>Registriert seit</tr>";
        while ($userdata = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                  <td>" . $userdata['username'] . "</td>
                  <td>" . $userdata['email'] . "</td>
                  <td> " . $userdata['userrole'] . "</td>
                  <td>" . $userdata['reg_since'] . "</td>
                  </tr>";
        }
        echo "
        </table>
        </h4>";
    }
}
