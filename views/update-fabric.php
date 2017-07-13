<div class="container">


    <div class="row">
        <table>
            <tbody>


            <tr>

                <td>
                    <img src="<?= $oneFabric['img_url'] ?>"/>
                    <br>
                    <br>
                    <form method="post" id="inline_btn" name="update" action="/do-fabric-update">
                        <input type="hidden" name="update" value="submit"/>
                        <div class="form-group">
                            <label>Fabric name:</label>
                            <input type="text" name="category" class="form-control" value="<?= $oneFabric['category'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Composition:</label>
                            <input type="text" name="composition" class="form-control"
                                   value="<?= $oneFabric['composition'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Amount (in meters):</label>
                            <input type="text" name="amount_meter" class="form-control"
                                   value="<?= $oneFabric['amount_meter'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Image URL:</label>
                            <input type="text" name="img_url" class="form-control"
                                   value="<?= $oneFabric['img_url'] ?>">
                        </div>

                        <button class="btn btn-info" id="inline_btn" type="submit" name="id" value="<?= $oneFabric['id']; ?>">Update</button>

                    </form>
                    <!--form method="post" id="inline_btn" name="delete" action="/do-fabric-delete">

                        <input type="hidden" name="delete" value="submit"/>

                        <button class="btn btn-danger" id="inline_btn" type="submit" name="id" value="<?= $row['id']; ?>">Delete
                        </button>
                    </form-->
                </td>

            </tr>


            </tbody>
        </table>
    </div>


    <hr>
