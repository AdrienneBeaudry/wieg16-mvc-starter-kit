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

    <!-- Custom CSS
    <link href="/css/custom_style.css" rel="stylesheet">
    -->

    <!-- LESS Custom CSS -->
    <link href="/css/mystyles.less" rel="stylesheet/less" type="text/css" />


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

            <a class="submenu" href="/fabrics">FABRIC COLLECTION</a>

            <a class="submenu" href="/patterns">PATTERN COLLECTION</a>

            <a class="submenu" href="#">ADD NEW</a>


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
            <form method="post" id="reg" name="reg">
                <div class="form-group row">
                    <label for="category" class="col-2 col-form-label">Fabric Name</label>
                    <div class="col-10">
                        <input class="form-control" type="text" placeholder="Ex: Cotton Batiste, Printed Voile" name="category">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="composition" class="col-2 col-form-label">Composition</label>
                    <div class="col-10">
                        <input class="form-control" type="text" placeholder="Ex: 98% Cotton, 2% Spandex" name="composition">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="patter_id" class="col-2 col-form-label">Pattern #</label>
                    <div class="col-10">
                        <input class="form-control"  type="text" placeholder="Ex: V5689" name="pattern_id">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="fabric_img_url" class="col-c col-form-label">Image URL</label>
                    <div class="col-10">
                        <input class="form-control" type="text" placeholder="Ex: https://www.google.com" name="fabric_img_url">
                    </div>
                </div>

                <input class="btn btn-primary" type="submit" value="Submit"/>


            </form>
        </div>


    </div>

</div>

    <hr>

    <footer>
        <p>&copy; 2016 Word Artisans, Inc.</p>
    </footer>



</div> <!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/js/less.js" type="text/javascript"></script>
<script src="/js/vendor/jquery-3.2.1.min.js"></script>
<script src="/js/vendor/bootstrap.min.js"></script>
</body>
</html>