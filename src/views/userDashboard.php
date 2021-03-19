<?php require_once('../elements/header.php');?>


<section class="row">

<div class="col">

<?php

    require_once('../models/showUser.php');
    require_once('../elements/modal/registerUser.php');
    require_once('../elements/modal/deleteUser.php');
    require_once('../elements/modal/editUser.php');
    require_once('../elements/userManagement.php');

?>
</div>


</section>

<?php require_once('../elements/footer.php');?>