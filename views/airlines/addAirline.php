<?php require DIR.'views/top.php' ?>
<?php require DIR.'views/menu.php' ?>
<?php require DIR.'views/msg.php' ?>
<div class="mainControll">
  <h6>Add new Airline: </h6>
  <form action="<?= URL ?>airlines/addAirline" method="post">
    <div class="form-group">
      <label class="label" for="formGroupExampleInput">Airline name:</label>
      <input type="text" class="form-control" name="name">
    </div>
    <div class="form-group">
      <label class="label" for="formGroupExampleInput2">Airline country:</label>
      <select class="form-select" size="3" aria-label="size 3 select example" name="country[]" multiple>
        <?php foreach($countries as $country) : ?>
        <option value="<?= $country['name']?>"><?= $country['name']?></option>
        <?php endforeach ?>
      </select>
    </div>
    <br>
    <button type="submit" class="btn btn-secondary">Create new airport</button>
  </form>
  <br>
  <a href="<?= URL ?>airlines/airlinesList">
    <button type="button" class="btn btn-secondary">Airports List</button>
  </a>
</div>
<?php require DIR.'views/bottom.php' ?>