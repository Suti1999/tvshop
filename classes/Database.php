<?php

class Database {
    
    private $db = null;
    public $error = false;
    
    public function __construct($host, $username, $pass, $db) {
        try {
            $this->db = new mysqli($host, $username, $pass, $db);
            $this->db->set_charset("utf8");
        } catch (Exception $ex) {
            $this->error = true;
            echo '<p>Az adatbázis nem elérhető!</p>';
            exit();
        }
    }
    
      public function login($name, $pass) {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE username LIKE ?;');
        $stmt->bind_param("s", $name);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            if ($pass == $row['password']) {
                $_SESSION['user'] = $row;
                $_SESSION['login'] = true;
            } else {
                $_SESSION['username'] = '';
                $_SESSION['login'] = false;
            }
            $result->free_result();
            header("Location:index.php");
        }
        return false;
    }
    
     public function register($emailcim, $username, $password) {
            $stmt = $this->db->prepare("INSERT INTO `users`(`emailcim`, `username`, `password`) VALUES (?,?,?)");
            $stmt->bind_param("sss", $emailcim, $username, $password);

        try {
            if ($stmt->execute()) {
                $_SESSION['login'] = true;
            } else {
                $_SESSION['login'] = false;
                echo '<p>Rögzítés sikertelen!</p>';
            }
        } catch (Exception $ex) {
            $this->error = true;
        }
    }
    
    public function osszesTermek() {
        $result = $this->db->query("SELECT * FROM `termek`");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getKivalasztottTermek($termekId) {
        $stmt = $this->db->prepare("SELECT * FROM `termek` WHERE `termekid` = ?");
        $stmt->bind_param("i", $termekId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
    public function hirdetesKeszitese($termek_neve, $marka, $kepernyomeret, $felbontas, $kijelzo_felbontas, $Smart, $Hangteljesitmeny, $WIFI, $Bluetooth, $AR, $Garancia, $userid, $termekid) {
    $stmt = $this->db->prepare("INSERT INTO `eladas`(`termek_neve`, `marka`, `felbontas`, `kijelzo_felbontas`, `Smart`, `Hangteljesitmeny`, `WIFI`, `Bluetooth`, `AR`, `Garancia`, `userid`, `termekid`) VALUES (?,?,?,?,?,?,?,?,?,?,?, ?, ?)");


    $stmt->bind_param("ssssssssssii", $termek_neve, $marka, $kepernyomeret, $felbontas, $kijelzo_felbontas, $Smart, $Hangteljesitmeny, $WIFI, $Bluetooth, $AR, $Garancia, $userid, $termekid);

    try {
        if ($stmt->execute()) {
            echo 'Hirdetés sikeresen feladva!';
        } else {
            echo 'Hirdetés feladása sikertelen!';
        }
    } catch (Exception $ex) {
        $this->error = true;
    }
}
}


   
