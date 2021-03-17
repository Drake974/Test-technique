<?php require_once('../elements/header.php');?>


<section class="row">
<div class="col-md-2 col-sm-12 dashboard d-flex flex-column justify-content-center align-items-center">

<?php require_once('../elements/sidebar.php'); ?>
</div>
<div class="col-md-10 col-sm-12">

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