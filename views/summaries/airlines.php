<?php require DIR.'views/top.php' ?>
<?php require DIR.'views/menu.php' ?>
<?php require DIR.'views/msg.php' ?>
<div class="mainControll">
    <h6>Airlines without countries. </h6>
    <table class="table table-striped table-dark countriesTable">
        <thead>
            <tr>
                <th scope="col">Airline name</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($airlines as $num => $airline) : ?>
            <tr>
                <td>
                    <a class="airlineEdit" href="<?= URL ?>airlines/editAirline/<?= $airline['name'] ?>"><?= $airline['name']?></a>
                </td>
            </tr>    
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?php require DIR.'views/bottom.php' ?>
