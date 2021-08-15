<?php require DIR.'views/top.php' ?>
<?php require DIR.'views/menu.php' ?>
<?php require DIR.'views/msg.php' ?>
<div class="mainControll">
    <h6>Welcome to Airlines section. </h6>
    <div class="selectBtn">
        <a href="<?= URL ?>airlines/addAirline">
            <button type="button" class="btn btn-secondary">New Airline</button>
        </a>
    </div>
    <div class="selectBtn">
        <a href="<?= URL ?>airlines/airlinesList">
            <button type="button" class="btn btn-secondary">Airlines List</button>
        </a>
    </div>
</div>
<?php require DIR.'views/bottom.php' ?>