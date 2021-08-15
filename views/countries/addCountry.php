<?php require DIR.'views/top.php' ?>
<?php require DIR.'views/menu.php' ?>
<?php require DIR.'views/msg.php' ?>
<div class="mainControll">
  <h6>Add new Country: </h6>
  <form action="<?= URL ?>countries/addCountry" method="post">
    <div class="form-group">
      <label class="label" for="formGroupExampleInput2">Country ISO:</label>
      <select class="selectpicker countrypicker" name="iso"></select>
    </div>  
    <div class="form-group">
      <label class="label" for="formGroupExampleInput">Country name:</label>
      <input type="text" class="form-control" name="name" placeholder="Type country name from above:">
    </div>
    <button type="submit" class="btn btn-secondary">Add new Country</button>
  </form>
  <br>
  <a href="<?= URL ?>countries/countriesList">
    <button type="button" class="btn btn-secondary">Countries List</button>
  </a>
</div>
<?php require DIR.'views/bottom.php' ?>