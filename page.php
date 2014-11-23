<?php

$pageURI = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);

if (file_exists($pageURI . '.php'));
$pageInfo = Include $pageURI . ".php";
$menuInfo = Include menu.php;