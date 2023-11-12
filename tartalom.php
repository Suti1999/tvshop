<?php
switch ($menu) {
    case 'logout':
        require_once './pages/logout.php';
        break;
    case 'login':
        require_once './pages/login.php';
        break;
    case 'regisztracio':
        require_once './pages/regisztracio.php';
        break;
    case 'rolunk':
        require_once './pages/rolunk.php';
        break;
    case 'kivalasztott':
        require_once './pages/kivalasztott.php';
        break;
    case 'home':
        require_once './pages/home.php';
        break;
    case 'megvasarlas':
        require_once './pages/megvasarlas.php';
        break;
    case 'eladas':
        require_once './pages/eladas.php';
        break;
    default:
        require_once './pages/home.php';
        break;
}


