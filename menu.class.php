<?php

class menu {

    var $menuData;

    function __construct($url) {
        $this->setMenuData($url);
    }

    function getData() {
        return $this->menuData;
    }

    function setMenuData($url) {
        try {
            $this->menuData = new SimpleXMLElement($url, 0, true);
        } catch (\Exception $e) {
            echo 'stuff';
            die($e->getMessage());
        }
    }
    function getMenu() {
        $menuData = $this->menuData;
        $output = '';
        $output .= '<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                        <div class="container">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>';
        $output .= "\n" . '<a class="navbar-brand" href="' . $menuData->brand->link . '">' . $menuData->brand->title . '</a>';
        $output .= "\n" . '</div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">';
        foreach ($menuData as $item) {
            if ($item->getName() == 'submenu') {
                $output .= $this->subMenuGenerator($item);
            } else if ($item->getName() == 'item') {
                $output .= $this->menuItemGenerator($item);
            }
        }
        $output .= '</ul>' . "\n" . '</div>' . "\n" . '</div>' . "\n" . '</nav>';
        return $output;
    }
    

    function subMenuGenerator($submenu) {
        $output = '';
        $output .= "\n" . '<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">' . $submenu->title . ' <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">';

        foreach ($submenu->children() as $item) {
            
            $output .= $this->menuItemGenerator($item);
        }
        $output .= '</ul>' . "\n" . '</li>' . "\n";
        return $output;
    }

    function menuItemGenerator($item) {
        return '<li><a href="' . $item->link . '">' . $item->title . '</a></li>' . "\n";
    }

}
