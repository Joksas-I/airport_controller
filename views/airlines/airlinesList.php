<?php require DIR.'views/top.php' ?>
<?php require DIR.'views/menu.php' ?>
<?php require DIR.'views/msg.php' ?>
<div class="mainControll">
    <h6>Airlines list. </h6>
    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Country</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($airlines as $num => $airline) : ?>
            <tr>
                <td><?= $airline['name']?></td>
                <td>
                    <?php if($airline['country'] != null) : ?>
                    <select class="selectOption" readonly="readonly">
                        <?php foreach($airline['country'] as $country) : ?>        
                        <option class="optionselect"><?= $country?></option>      
                        <?php endforeach ?>
                    </select>
                    <?php else : ?>
                        none
                    <?php endif ?>
                </td>
                <td>
                    <a href="<?= URL ?>airlines/editAirline/<?= $airline['name'] ?>"><i class="fa fa-pencil iconEdit" aria-hidden="true"></i></a>
                </td>
                <td>
                    <form action="<?= URL ?>airlines/deleteAirline/<?= $airline['name'] ?>" method="post">
                    <button class ="deleteButton" type="submit"><i class="fa fa-trash-o iconDelete" aria-hidden="true"></i></button>
                    </form>
                </td>
            </tr>    
            <?php endforeach ?>
        </tbody>
    </table>
    <a href="<?= URL ?>airlines/addAirline">
        <button type="button" class="btn btn-secondary">New Airline</button>
    </a>
</div>
<?php require DIR.'views/bottom.php' ?>