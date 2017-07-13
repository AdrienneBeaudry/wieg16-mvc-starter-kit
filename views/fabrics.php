

<div class="container">


    <div class="row">
        <table>
            <tbody>

            <?php foreach ($fabrics as $row) { ?>
                <tr>

                    <td>
                        <div class="fabric_img_parent">
                            <img class="fabric_img" src="<?= $row['img_url'] ?>"/>
                        </div>
                        <h5>
                            <?= $row['category'] ?>
                            <?= $row['amount_meter'] ?>
                        </h5>
                        <a class="btn btn-info" href="/update-fabric?id=<?= $row['id']; ?>">Update</a>
                        <a class="btn btn-danger" href="/do-fabric-delete?id=<?= $row['id']; ?>">Delete</a>
                    </td>

                </tr>
            <?php } ?>


            </tbody>
        </table>
    </div>


    <hr>
