<?php require DIR.'views/top.php' ?>
<?php require DIR.'views/menu.php' ?>
<?php require DIR.'views/msg.php' ?>
<div class="mainControll">
  <h6>Edit Airport: </h6>
  <form action="<?= URL ?>airports/updateAirport/<?= $airport['name'] ?>" method="post">
    <div class="form-group">
      <label class="label" for="formGroupExampleInput">Airport name:</label>
      <input type="text" class="form-control" name="name" value="<?=$airport['name'] ?>">
    </div>
    <div class="form-group">
      <label class="label" for="formGroupExampleInput2">Airport country:</label>
      <select name="country">
        <?php foreach($countries as $country) : ?>
        <option value="<?= $country['name']?>" <?php if($airport['country'] == $country['name']) : ?> selected <?php endif ?>><?= $country['name']?></option>
        <?php endforeach ?>
      </select>
    </div>
    <div class="form-group">
      <label class="label" for="formGroupExampleInput2">Airport location:</label>
      <input type="text" class="form-control" name="location[]" value="<?=$airport['location'][0] ?>">
      <input type="text" class="form-control" name="location[]" value="<?=$airport['location'][1] ?>">
    </div>
    <div class="form-group">
      <label class="label" for="formGroupExampleInput2">Airport airlines:</label>
      <?php foreach($airlines as $airline) : ?>
      <input type="checkbox" name="airlines[]" value="<?= $airline['name'] ?>"
      <?php foreach($airport as $data) : ?>
      <?php if(is_array($data) && in_array($airline['name'], $data)) : ?>
        checked
      <?php endif ?>
      <?php endforeach ?>
      > <?= $airline['name'] ?>
      <?php endforeach ?>
    </div>
    <button type="submit" class="btn btn-secondary">Save changes</button>
  </form>
  <br>
  <a href="<?= URL ?>airports/airportsList">
    <button type="button" class="btn btn-secondary">Airports List</button>
  </a>
</div>
<?php require DIR.'views/bottom.php' ?>