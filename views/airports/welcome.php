<?php require DIR.'views/top.php' ?>
<?php require DIR.'views/menu.php' ?>
<?php require DIR.'views/msg.php' ?>
<div class="mainControll">
    <h6>Welcome to Airports section. </h6>
    <div class="selectBtn">
        <a href="<?= URL ?>airports/addAirport">
            <button type="button" class="btn btn-secondary">New Airport</button>
        </a>
    </div>
    <div class="selectBtn">
        <a href="<?= URL ?>airports/airportsList">
        <button type="button" class="btn btn-secondary">Airports List</button>
        </a>
    </div>
</div>
<?php require DIR.'views/bottom.php' ?>