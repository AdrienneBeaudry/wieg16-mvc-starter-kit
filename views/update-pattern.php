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

            <a class="submenu" href="/add-new">ADD NEW</a>


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


            <?php foreach ($oneFabric as $row) { ?>

            <tr>

                <td>
                    <img src="<?= $row['fabric_img_url'] ?>"/>
                    <br>
                    <br>
                    <form method="post" id="inline_btn" name="update" action="/do-pattern-update">
                        <input type="hidden" name="update" value="submit"/>
                        <div class="form-group">
                            <label>Pattern #:</label>
                            <input type="text" name="pattern #" class="form-control" value="<?= $row['pattern_nr'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Company:</label>
                            <input type="text" name="company" class="form-control"
                                   value="<?= $row['company'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Collection:</label>
                            <input type="text" name="collection" class="form-control"
                                   value="<?= $row['collection'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Season:</label>
                            <input type="text" name="season" class="form-control"
                                   value="<?= $row['season'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Recommended Fabrics:</label>
                            <input type="text" name="recommended_fabrics" class="form-control"
                                   value="<?= $row['recommended_fabrics'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Pattern number:</label>
                            <input type="text" name="pattern_nr" class="form-control"
                                   value="<?= $row['pattern_nr'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Pattern Image URL:</label>
                            <input type="text" name="pattern_img_url" class="form-control"
                                   value="<?= $row['pattern_img_url'] ?>">
                        </div>

                        <button class="btn btn-info" id="inline_btn" type="submit" name="id" value="<?= $row['id']; ?>">Update</button>

                    </form>
                    <form method="post" id="inline_btn" name="delete" action="">

                        <input type="hidden" name="delete" value="submit"/>

                        <button class="btn btn-danger" id="inline_btn" type="submit" name="id" value="<?= $row['id']; ?>">Delete
                        </button>
                    </form>
                </td>

                <?php } ?>
            </tr>


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
