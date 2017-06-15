

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
                    <!--form method="post" id="inline_btn" name="delete" action="">

                        <input type="hidden" name="delete" value="submit"/>

                        <button class="btn btn-danger" id="inline_btn" type="submit" name="id" value="<?= $row['id']; ?>">Delete
                        </button>
                    </form-->
                </td>

                <?php } ?>
            </tr>


            </tbody>
        </table>
    </div>


    <hr>
