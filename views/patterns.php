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
            <a class="submenu" href="/fabrics">FABRIC COLLECTION</a>
            <a class="submenu" href="#">PATTERN COLLECTION</a>
            <a class="submenu" href="/create-fabric">ADD NEW</a>
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
            <?php foreach ($patterns as $row) { ?>
                <tr>

                    <td>
                        <div class="pattern_img">
                            <img src="<?= $row['pattern_img_url'] ?>" alt=""/>
                        </div>

                        <h3>
                            <?= $row['company'] ?>
                            <?= $row['pattern_id'] ?>
                        </h3>

                        <p>
                            <?= $row['designer'] ?>
                        </p>

                        <button class="btn btn-info" type="submit" value="Update">Modify</button>
                        <button class="btn btn-danger" type="submit" value="Delete">Delete</button>

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
<script src="/js/vendor/jquery-3.2.1.min.js"></script>
<script src="/js/vendor/bootstrap.min.js"></script>
</body>
</html>