<?php require_once('../elements/header.php');?>


<section class="row">
<div class="col-md-2 col-sm-12 dashboard d-flex flex-column justify-content-center align-items-center">

<?php require_once('../elements/sidebar.php'); ?>
</div>
<div class="col-md-10 col-sm-12">

<?php
require_once('../models/bookingShowManagement.php');
require_once('../models/bookingManagement.php');
require_once('../models/showComputer.php');
require_once('../elements/modal/registerAdd.php');
require_once('../elements/modal/deleteBooking.php');
require_once('../elements/bookingManagement.php');

?>
</div>


</section>

<?php require_once('../elements/footer.php');?>