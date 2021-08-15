<?php require DIR.'views/top.php' ?>
<?php require DIR.'views/menu.php' ?>
<?php require DIR.'views/msg.php' ?>
<div class="mainControll">
    <h6>Welcome to Summaries section. </h6>
    <div class="selectBtn">
        <a href="<?= URL ?>summaries/airlines">
            <button type="button" class="btn btn-secondary">Airlines without country(ies).</button>
        </a>
    </div>
    <div class="selectBtn">
        <a href="<?= URL ?>summaries/countries">
            <button type="button" class="btn btn-secondary">Countries without airline(s) and airport(s).</button>
        </a>
    </div>
</div>
<?php require DIR.'views/bottom.php' ?>