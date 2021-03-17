<?php require_once('../elements/header.php');?>


<section class="row">
<div class="col-md-2 col-sm-12 dashboard d-flex flex-column justify-content-center align-items-center">

<?php require_once('../elements/sidebar.php'); ?>
</div>
<div class="col-md-10 col-sm-12">

<?php

require_once('../models/showComputer.php');
require_once('../elements/modal/registerComputer.php');
require_once('../elements/modal/editComputer.php');
require_once('../elements/modal/deleteComputer.php');
require_once('../elements/computerManagement.php');

?>
</div>


</section>

<?php require_once('../elements/footer.php');?>