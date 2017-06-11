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
    <link href="/css/mystyles.less" rel="stylesheet/less" type="text/css"/>


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
            <a class="navbar-brand" href="#">SEWING PLANNER</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">

            <a class="submenu" href="/fabrics">FABRIC COLLECTION</a>

            <a class="submenu" href="/patterns">PATTERN COLLECTION</a>

            <a class="submenu" href="/create">ADD NEW</a>


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


    <div class="row">
        <table>
            <tbody>
            <?php foreach ($viewData as $row) { ?>
            <tr>
                <td>
                    <br>
                    <div class="fabric_img_parent">
                        <img class="fabric_img" src="<?= $row['fabric']['fabric_img_url'] ?>"/>
                    </div>
                    <br>
                    <br>
                    <h5>
                        <?= $row['fabric']['category'] ?>
                    </h5>
                    <br>
                    <br>
                </td>
                <td>
                    <?php foreach ($row['patterns'] as $pattern) { ?>
                        <div class="pattern_img_parent">
                            <img class="pattern_img" src="<?= $pattern['pattern_img_url'] ?>"/>
                        </div>
                    <?php } ?>
                </td>
            </tr>
            <?php  } ?>
            <?php foreach ($viewData as $row=>$tbl) { ?>
                <tr>
                    <td>
                        <br>
                        <div class="fabric_img_parent">
                            <img class="fabric_img" src="<?= $row['fabric'][$value]['fabric_img_url'] ?>"/>
                        </div>
                        <br>
                        <br>
                        <h5>
                            <?= $row['fabric'][$value]['category'] ?>
                        </h5>
                        <br>
                        <br>
                    </td>
                <?php } ?>
                <?php foreach ($tbl as $value) { ?>

                    <td>
                        <div class="pattern_img_parent">
                            <img class="pattern_img" src="<?= $row['patterns'][$value]['pattern_img_url'] ?>" alt=""/>
                        </div>

                        <h3>
                            <?= $row['patterns'][$value]['company'] ?>
                            <?= $row['patterns'][$value]['pattern_nr'] ?>
                        </h3>

                        <p>
                            <?= $row['patterns'][$value]['collection'] ?>
                        </p>

                    </td>



                </tr>
            <?php } ?>
            </tbody>
        </table>
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
