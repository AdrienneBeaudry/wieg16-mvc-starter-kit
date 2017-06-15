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
                    <form method="post" id="inline_btn" name="update" action="/do-fabric-update">
                        <input type="hidden" name="update" value="submit"/>
                        <div class="form-group">
                            <label>Fabric name:</label>
                            <input type="text" name="category" class="form-control" value="<?= $row['category'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Composition:</label>
                            <input type="text" name="composition" class="form-control"
                                   value="<?= $row['composition'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Amount (in meters):</label>
                            <input type="text" name="amount_meter" class="form-control"
                                   value="<?= $row['amount_meter'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Image URL:</label>
                            <input type="text" name="fabric_img_url" class="form-control"
                                   value="<?= $row['fabric_img_url'] ?>">
                        </div>

                        <button class="btn btn-info" id="inline_btn" type="submit" name="id" value="<?= $row['id']; ?>">Update</button>

                    </form>
                    <!--form method="post" id="inline_btn" name="delete" action="/do-fabric-delete">

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
