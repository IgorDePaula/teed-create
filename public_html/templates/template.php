<!DOCTYPE html>
<html>
<head>
    <title> TeedCreate </title>
    <link rel="stylesheet" href="public_html/node_modules/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="public_html/css/default.css"/>
</head>
<body ng-app="app" ng-controller="HomeController">

    <header>

        <?php include 'public_html/templates/header.php'; ?>

    </header>

    <div class="container">

        <div class="container-fluid">

            <?php include $page; ?>

        </div>

    </div>

    <footer>

        <?php include 'public_html/templates/footer.php'; ?>

    </footer>

    <script src="public_html/node_modules/jquery/jquery.min.js"></script>
    <script src="public_html/node_modules/angular/angular.min.js"></script>
    <script src="public_html/node_modules/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>