<?php require DIR.'views/top.php' ?>
<?php require DIR.'views/menu.php' ?>
<?php require DIR.'views/msg.php' ?>
<div class="mainControll">
    <h6>Airports list. </h6>
    <table class="table table-striped table-dark">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Country</th>
            <th scope="col" colspan="2">Location</th>
            <th scope="col">Airlines</th>
            <th scope="col">Edit</i></th>
            <th scope="col">Delete</i></th>
          </tr>
        </thead>
        <tbody>
            <?php foreach($airports as $num => $airport) : ?>
            <tr>
                <td><?= $airport['name']?></td>
                <td><?= $airport['country']?></td>
                <td><?= $airport['location'][0]?></td>
                <td><?= $airport['location'][1]?></td>
                <td>
                    <?php if($airport['airlines'] != null) : ?>
                    <select class="selectOption" readonly="readonly">
                        <?php foreach($airport['airlines'] as $airline) : ?>
                        <option class="optionselect"><?= $airline?></option>
                        <?php endforeach ?>
                    </select>
                    <?php else : ?>
                    none
                    <?php endif ?>
                </td>
                <td>
                    <a href="<?= URL ?>airports/editAirport/<?= $airport['name'] ?>"><i class="fa fa-pencil iconEdit" aria-hidden="true"></i></a>
                </td>
                <td>
                    <form action="<?= URL ?>airports/deleteAirport/<?= $airport['name'] ?>" method="post">
                        <button class ="deleteButton" type="submit"><i class="fa fa-trash-o iconDelete" aria-hidden="true"></i></button>
                    </form>
                </td>
            </tr>    
            <?php endforeach ?>
        </tbody>
    </table>
    <a href="<?= URL ?>airports/addAirport">
        <button type="button" class="btn btn-secondary">New Airport</button>
    </a>
</div>
<?php require DIR.'views/bottom.php' ?>