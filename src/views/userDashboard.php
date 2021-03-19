<?php require_once(dirname(__DIR__).'/elements/header.php');?>



<div class="row">
<div class="col-12">

<?php

    require_once(dirname(__DIR__).'/models/showUser.php');
    require_once(dirname(__DIR__).'/elements/modal/registerUser.php');
    require_once(dirname(__DIR__).'/elements/modal/deleteUser.php');
    require_once(dirname(__DIR__).'/elements/modal/editUser.php');
    require_once(dirname(__DIR__).'/elements/userManagement.php');

?>
</div>
</div>


<?php require_once(dirname(__DIR__).'/elements/footer.php');?>