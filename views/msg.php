<?php
use Airport\App;
if ($info = App::getMessage()) : ?>
    <?php 
    $msg = $info[0];
    $type = $info[1];
    ?>
<div class="<?= $type?>">
    <span class="msg"><?= $msg ?></span>
</div>
<?php endif ?>