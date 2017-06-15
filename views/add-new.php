

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
