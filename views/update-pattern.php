

<div class="container">


    <div class="row">
        <table>
            <tbody>


            <tr>

                <td>
                    <img src="<?= $onePattern['img_url'] ?>"/>
                    <br>
                    <br>
                    <form method="post" id="inline_btn" name="update" action="/do-pattern-update">
                        <input type="hidden" name="update" value="submit"/>
                        <div class="form-group">
                            <label>Pattern #:</label>
                            <input type="text" name="pattern #" class="form-control" value="<?= $onePattern['pattern_nr'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Company:</label>
                            <input type="text" name="company" class="form-control"
                                   value="<?= $onePattern['company'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Collection:</label>
                            <input type="text" name="collection" class="form-control"
                                   value="<?= $onePattern['collection'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Season:</label>
                            <input type="text" name="season" class="form-control"
                                   value="<?= $onePattern['season'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Recommended Fabrics:</label>
                            <input type="text" name="recommended_fabrics" class="form-control"
                                   value="<?= $onePattern['recommended_fabrics'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Pattern number:</label>
                            <input type="text" name="pattern_nr" class="form-control"
                                   value="<?= $onePattern['pattern_nr'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Pattern Image URL:</label>
                            <input type="text" name="img_url" class="form-control"
                                   value="<?= $onePattern['img_url'] ?>">
                        </div>

                        <button class="btn btn-info" id="inline_btn" type="submit" name="id" value="<?= $onePattern['id']; ?>">Update</button>

                    </form>
                    <!--form method="post" id="inline_btn" name="delete" action="">

                        <input type="hidden" name="delete" value="submit"/>

                        <button class="btn btn-danger" id="inline_btn" type="submit" name="id" value="">Delete
                        </button>

                       HERE-- HERE--
                        <select class="form-control" name="paired[]" multiple="multiple">
                        <option value="<?= $fabric['id'] ?>" <?= isSelected($fabric['id'], $related) ?>>
                            <?= $fabric['category']?>
                            etc
                        etc
                        </option>
                    </form-->
                </td>

            </tr>


            </tbody>
        </table>
    </div>


    <hr>
