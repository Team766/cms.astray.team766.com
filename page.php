<?php 
include 'menu.class.php';
$pageURI = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
$baseDirectory = '/cms.astray.team766.com/';
$baseDomain = "http://localhost";
$pageRelativeURI = basename($pageURI);
$pages = new SimpleXMLElement('content/pages.xml', 0, true);

if (substr_count(str_replace($baseDirectory, "" ,$pageURI),'/') > 0) {
    header('Location: ' . $baseDomain . $baseDirectory . $pageRelativeURI);
}

$title = '404 File Not Found | Team 766';
$pageFileURL = 'content/404.html';
foreach($pages->children() as $page) {
    if ($page->url == $pageRelativeURI) {
        $title = $page->title . ' | Team 766';
        $pageFileURL = 'content/' . $page->url . '.html';
    }
}

$menu = new Menu('mainMenu.xml', $pageRelativeURI);
$menuHTML = $menu->getMenu();
$headerHTML = str_replace('TITLE_PLACEHOLDER', $title, file_get_contents('content/header.html'));
$pageHTML = file_get_contents($pageFileURL);
$footerHTML = file_get_contents('content/footer.html');


echo $headerHTML . $menuHTML . $pageHTML . $footerHTML;
?>


