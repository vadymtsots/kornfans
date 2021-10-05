<?php

require_once("layout/header.php");

require_once("layout/sidebar.php");

$pageName = $_GET['action'];

if (isset($_GET['action']) && file_exists("views/" . $pageName . ".php")){
    require_once("views/" . $pageName . ".php");
} else if (!file_exists("views/" . $pageName . ".php")) {
    require_once("views/notfound.php");
} else {
    require_once("views/main.php");
}

require_once("layout/footer.php");














