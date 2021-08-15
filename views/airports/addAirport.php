<?php require DIR.'views/top.php' ?>
<?php require DIR.'views/menu.php' ?>
<?php require DIR.'views/msg.php' ?>
<div class="mainControll">
    <h6>Add new Airport: </h6>
    <form action="<?= URL ?>airports/addAirport" method="post">
      <div class="form-group">
        <label class="label" for="formGroupExampleInput">Airport name:</label>
        <input type="text" class="form-control" name="name">
      </div>
      <div class="form-group">
        <label class="label" for="formGroupExampleInput2">Airport country:</label>
        <select class="form-select" size="3" aria-label="size 3 select example" name="country">
          <?php foreach($countries as $country) : ?>
          <option value="<?= $country['name']?>"><?= $country['name']?></option>
          <?php endforeach ?>
        </select>
      </div>
      <div class="form-group">
        <label class="label" for="formGroupExampleInput2">Airport location:</label>
        <input type="text" class="form-control" name="location[]" placeholder="longtitude">
        <input type="text" class="form-control" name="location[]" placeholder="latitude">
      </div>
      <div class="form-group">
        <label class="label" for="formGroupExampleInput2">Airport airlines:</label>
        <?php foreach($airlines as $airline) : ?>
        <input type="checkbox" name="airlines[]" value="<?= $airline['name'] ?>"> <?= $airline['name'] ?>
        <?php endforeach ?>
      </div>
    <button type="submit" class="btn btn-secondary">Create new airport</button>
  </form>
  <br>
    <a href="<?= URL ?>airports/airportsList">
      <button type="button" class="btn btn-secondary">Airports List</button>
    </a>
</div>
<?php require DIR.'views/bottom.php' ?>