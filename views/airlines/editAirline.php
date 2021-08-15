<?php require DIR.'views/top.php' ?>
<?php require DIR.'views/menu.php' ?>
<?php require DIR.'views/msg.php' ?>
<div class="mainControll">
  <h6>Edit Airline: </h6>
  <form action="<?= URL ?>airlines/updateAirline/<?= $airline['name'] ?>" method="post">
    <div class="form-group">
      <label class="label" for="formGroupExampleInput">Airline name:</label>
      <input type="text" class="form-control" name="name" value="<?=$airline['name'] ?>" readonly>
    </div>
    <div class="form-group">
      <label class="label" for="formGroupExampleInput2">Airline country(ies):</label>
      <?php foreach($countries as $country) : ?>
      <input type="checkbox" name="country[]" value="<?= $country['name'] ?>"
      <?php foreach($airline as $data) : ?>
      <?php if(is_array($data) && in_array($country['name'], $data)) : ?>
        checked
      <?php endif ?>
      <?php endforeach ?>
      > <?= $country['name'] ?>
      <?php endforeach ?>
    </div>
    <button type="submit" class="btn btn-secondary">Save changes</button>
  </form>
  <br>
    <a href="<?= URL ?>airlines/airlinesList">
      <button type="button" class="btn btn-secondary">Airlines List</button>
    </a>
</div>
<?php require DIR.'views/bottom.php' ?>