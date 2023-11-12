<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
require_once './classes/Database.php';
$db = new Database("localhost", "root", "", "tvshop");

if (!isset($_SESSION['login'])){$_SESSION['login'] = false;}

require_once './layout/head.php';
$menu = filter_input(INPUT_GET, "menu");
?>

<body>
    <?php
    require_once './layout/menu.php';
    require_once './tartalom.php';
    ?>
</body>
</html>

