<?php require DIR.'views/top.php' ?>
<?php require DIR.'views/menu.php' ?>
<?php require DIR.'views/msg.php' ?>
<div class="mainControll">
    <h6>Welcome to Countries section. </h6>
    <!-- <a href="<?= URL ?>countries/addCountry">
    <button type="button" class="btn btn-secondary">New Country</button>
    </a> -->
    <div class="selectBtn">
        <a href="<?= URL ?>countries/countriesList">
        <button type="button" class="btn btn-secondary">Countries List</button>
        </a>
    </div>
</div>
<?php require DIR.'views/bottom.php' ?>