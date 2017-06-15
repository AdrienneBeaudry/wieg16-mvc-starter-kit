
<div class="container">


    <div class="row">
        <table>
            <tbody>
            <?php foreach ($patterns as $row) { ?>
                <tr>

                    <td>
                        <div class="pattern_img_parent">
                            <img class="pattern_img" src="<?= $row['pattern_img_url'] ?>" alt=""/>
                        </div>

                        <h3>
                            <?= $row['company'] ?>
                            <?= $row['pattern_nr'] ?>
                        </h3>

                        <p>
                            <?= $row['collection'] ?>
                        </p>

                        <a class="btn btn-info" href="/update-pattern?id=<?= $row['id']; ?>">Update</a>
                        <a class="btn btn-danger" href="/do-pattern-delete?id=<?= $row['id']; ?>">Delete</a>

                    </td>


                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>


    <hr>
