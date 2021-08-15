<?php require DIR.'views/top.php' ?>
<?php require DIR.'views/menu.php' ?>
<?php require DIR.'views/msg.php' ?>
<div class="mainControll">
    <h6>Countries without airline(s) and airport(s). </h6>
    <table class="table table-striped table-dark countriesTable">
        <thead>
            <tr>
                <th scope="col">Country name</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($countries as $num => $country) : ?>
            <tr>
                <td>
                    <?= $country?>
                </td>
            </tr>    
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?php require DIR.'views/bottom.php' ?>