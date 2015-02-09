<!DOCTYPE html>
<html>
<head>
    <title> TeedCreate </title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="public_html/node_modules/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="public_html/css/default.css"/>
</head>
<body ng-app="app" ng-controller="HomeController">

    <header>

        <?php include 'src/views/templates/header.php'; ?>

    </header>

    <div class="container">

        <div class="container-fluid">

            <?php include $page; ?>

        </div>

    </div>

    <script src="public_html/node_modules/jquery/jquery.min.js"></script>
    <script src="public_html/node_modules/angular/angular.min.js"></script>
    <script src="public_html/node_modules/bootstrap/js/bootstrap.min.js"></script>

    <script src="public_html/jscript/angularjs/Project.js"></script>
    <script src="public_html/jscript/Functions.js"></script>

</body>
</html>