<?php

    require_once '/vendor/autoload.php';

    $page = 'public_html/';

    $page .= isset($_GET['page'])&&!empty($_GET['page'])? "{$_GET['page']}.php": 'index.php';

    if(!file_exists($page)) $page = 'public_html/index.php';

    ////

    include 'public_html/templates/template.php';