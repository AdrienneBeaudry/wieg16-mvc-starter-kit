

<div class="container">


    <div class="row">
        <table>
            <tbody>
            <?php foreach ($pairedFabrics as $row) { ?>
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
                        <a class="btn btn-info" href="/update-pairing?fabric_id=<?= $pattern['fabric_id']; ?>&pattern_id=<?= $pattern['pattern_id']; ?>">Update</a>
                        <a class="btn btn-danger" href="/do-pairing-delete?fabric_id=<?= $pattern['fabric_id']; ?>&pattern_id=<?= $pattern['pattern_id']; ?>">Delete</a>
                    <?php } ?>
                </td>
            </tr>
            <?php  } ?>


            </tbody>
        </table>
    </div>

    <hr>

