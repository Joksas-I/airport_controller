<?php require DIR.'views/top.php' ?>
<?php require DIR.'views/menu.php' ?>
<?php require DIR.'views/msg.php' ?>
<div class="mainControll">
  <h6>Countries list. </h6>
  <table class="table table-striped table-dark countriesTable">
    <thead>
      <tr>
        <th scope="col">#ISO</th>
        <th scope="col">Country</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($countries as $num => $country) : ?>
      <tr>
        <td><?= $country['iso']?></td>
        <td><?= $country['name']?></td>
      </tr>
      <?php endforeach ?>
    </tbody>
  </table>
  <!-- <a href="<?= URL ?>countries/addCountry">
  <button type="button" class="btn btn-secondary">Add new Country</button>
  </a> -->
</div>
<?php require DIR.'views/bottom.php' ?>