<?php

require_once("layout/header.php");

require_once("layout/sidebar.php");

$pageName = $_GET['action'];

if (isset($_GET['action']) && file_exists("views/" . $pageName . ".php") && $_GET['action'] == $pageName ){
    require_once("views/" . $pageName . ".php");
} else {
    require_once("views/main.php");
}

require_once("layout/footer.php");














