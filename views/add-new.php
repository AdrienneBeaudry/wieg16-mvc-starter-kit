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

    <div class="row">

        <div class="col col-lg-5 col-md-5 col-sm-12">

            <form method="post" action="/save-new-pattern" id="reg" name="add-pattern">
                <div class="row">
                    <h3>Add New Pattern</h3>
                </div>

                <div class="form-group row">
                    <label for="pattern_nr" class="col-2 col-form-label">Pattern #</label>
                    <div class="col-10">
                        <input class="form-control" type="text" placeholder="Ex: V5689" name="pattern_nr">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="company" class="col-2 col-form-label">Company</label>
                    <div class="col-10">
                        <input class="form-control" type="text" placeholder="Vogue"
                               name="company">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="collection" class="col-2 col-form-label">Designer</label>
                    <div class="col-10">
                        <input class="form-control" type="text" placeholder="Amazing Fit, Donna Karen New York"
                               name="collection">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="recommended_fabrics" class="col-2 col-form-label">Recommended Fabrics</label>
                    <div class="col-10">
                        <input class="form-control" type="text" placeholder="Ex: Viscose, Crêpe de chine, Natural fibers in medium to lightweight"
                               name="recommended_fabrics">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="season" class="col-2 col-form-label">Season</label>
                    <div class="col-10">
                        <input class="form-control" type="text" placeholder="Ex: SS2017 or FW2016" name="season">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="pattern_img_url" class="col-c col-form-label">Pattern Image URL</label>
                    <div class="col-10">
                        <input class="form-control" type="text" placeholder="Ex: https://www.google.com"
                               name="pattern_img_url">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="fabric ideas" class="col-2 col-form-label">Could be used with following fabric(s) from my stash...</label>
                    <div class="col-10">
                        <select class="form-control" name="paired[]" multiple="multiple">
                            <?php foreach ($fabrics as $fabric) { ?>
                            <option value="<?= $fabric['id'] ?>" >
                                <tr>
                                    <td>⫸ <?= $fabric['category']?></td>
                                    <td>⫸ <?= $fabric['composition']?></td>
                                    <td>⫸ <?= $fabric['amount_meter']?> m</td>
                                </tr>
                            </option>
                            <?php }?>
                        </select>
                    </div>
                </div>

                <div class="row align-items-end">
                    <input class="btn btn-primary" type="submit" value="Submit"/>
                </div>

            </form>
            <br>
            <br>

        </div>


        <div class="col col-lg-5 col-lg-offset-1 col-md-offset-1 col-md-5 col-sm-12">

            <form method="post"  action="/save-new-fabric" name="add-fabric" id="create-fabric">
                <div class="row">
                    <h3>Add New Fabric</h3>
                </div>
                <div class="form-group row">
                    <label for="category" class="col-2 col-form-label">Fabric Name</label>
                    <div class="col-10">
                        <input class="form-control" type="text" placeholder="Ex: Cotton Batiste, Printed Voile"
                               name="category">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="composition" class="col-2 col-form-label">Composition</label>
                    <div class="col-10">
                        <input class="form-control" type="text" placeholder="Ex: 98% Cotton, 2% Spandex"
                               name="composition">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="amount_meter" class="col-2 col-form-label">Amount (in meters)</label>
                    <div class="col-10">
                        <input class="form-control" type="text" placeholder="Ex: 1.8"
                               name="amount_meter">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="fabric_img_url" class="col-c col-form-label">Fabric Image URL</label>
                    <div class="col-10">
                        <input class="form-control" type="text" placeholder="Ex: https://www.google.com"
                               name="fabric_img_url">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="id" class="col-2 col-form-label">Intended for the following patterns from my stash...</label>
                    <div class="col-10">
                        <select class="form-control" name="paired[]" multiple="multiple">
                            <?php foreach ($patterns as $pattern) { ?>
                                <option value="<?= $pattern['id'] ?>" >
                                        <td>⫸ <?= $pattern['company']?></td>
                                        <td>⫸ <?= $pattern['pattern_nr']?></td>
                                        <td>⫸ <?= $pattern['collection']?></td>
                                </option>
                            <?php }?>
                        </select>
                    </div>
                </div>


                <div class="row">
                <input class="btn btn-primary" type="submit" value="Submit"/>
                </div>

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
<script src="/js/vendor/jquery-3.2.1.js"></script>
<script src="/js/vendor/bootstrap.min.js"></script>
</body>
</html>