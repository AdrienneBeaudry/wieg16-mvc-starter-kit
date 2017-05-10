<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>MVC Project: SEWING PLANNER</title>
    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/css/custom_style.css" rel="stylesheet">


</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">SEWING PLANNER</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">

            <a class="submenu" href="#">ADD NEW FABRIC</a>

            <a class="submenu" href="#">ADD NEW PATTERN</a>


        </div><!--/.navbar-collapse -->
    </div>
</nav>

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <h1></h1>
        <p></p>

    </div>
</div>


<div class="container">

    <div class="row justify-content-center">

        <div class="col col-md-6">
            <form action="<?php $_PHP_SELF ?>" method="post">
                <div class="form-group row">
                    <label for="category" class="col-2 col-form-label">Fabric Name</label>
                    <div class="col-10">
                        <input class="form-control" type="text" placeholder="Ex: Cotton Batiste, Printed Voile" id="category">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="composition" class="col-2 col-form-label">Composition</label>
                    <div class="col-10">
                        <input class="form-control" type="text" placeholder="Ex: 98% Cotton, 2% Spandex" id="composition">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="patter_id" class="col-2 col-form-label">Pattern #</label>
                    <div class="col-10">
                        <input class="form-control" type="text" placeholder="Ex: V5689" id="pattern_id">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="fabric_img_url" class="col-c col-form-label">Image URL</label>
                    <div class="col-10">
                        <input class="form-control" type="url" placeholder="Ex: https://www.google.com" id="fabric_img_url">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Add</button>

            </form>
        </div>


    </div>

</div>

<?php
$a=array("Volvo"=>"XC90","BMW"=>"X5","Toyota"=>"Highlander");
$sqlTest = array_keys($a);
print_r($sqlTest);
$bindSqlTest = implode(",", $sqlTest);
print_r($bindSqlTest);
$bindingSqlTest = ':'.implode(',:', $sqlTest);
echo "<br><br>";
print_r($bindingSqlTest);

?>

<?php ?>
    <!-- Example row of columns
    <div class="row">
        <div class="col-md-4">
            <h2>Heading</h2>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris
                condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis
                euismod. Donec sed odio dui. </p>
            <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
            <h2>Heading</h2>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris
                condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis
                euismod. Donec sed odio dui. </p>
            <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
            <h2>Heading</h2>
            <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula
                porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut
                fermentum massa justo sit amet risus.</p>
            <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
    </div>
    -->

    <hr>

    <footer>
        <p>&copy; 2016 Word Artisans, Inc.</p>
    </footer>



</div> <!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/js/vendor/jquery-3.2.1.min.js"></script>
<script src="/js/vendor/bootstrap.min.js"></script>
</body>
</html>
