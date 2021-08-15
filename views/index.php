<?php require DIR.'views/top.php' ?>
<?php require DIR.'views/msg.php' ?>

<nav class="navbar navbar-light bg-light">Airport Controll</nav>
<!-- <?php include DIR.'views/msg.php' ?> -->
    <form class="form-inline" action="<?= URL ?>login" method="post">
        <div class="form-group mx-sm-3 mb-2">
            <input class="form-control" id="staticEmail2" type="text" name="user" placeholder="User ID">        
            <input class="form-control" id="inputPassword2" type="password" name="pass" placeholder="Password">
            <button type="submit" class="btn btn-primary mb-2">Log in</button>
        </div >
    </form>
</div>



<?php require DIR.'views/bottom.php' ?>