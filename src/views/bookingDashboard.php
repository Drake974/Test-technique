<?php require_once(dirname(__DIR__).'/controllers/session/session.php'); ?>
<?php require_once(dirname(__DIR__).'/elements/header.php');?>


<section class="row">

<div class="col">

<?php
require_once(dirname(__DIR__).'/models/bookingShowManagement.php');
require_once(dirname(__DIR__).'/models/bookingManagement.php');
require_once(dirname(__DIR__).'/models/showComputer.php');
require_once(dirname(__DIR__).'/elements/modal/registerAdd.php');
require_once(dirname(__DIR__).'/elements/modal/deleteBooking.php');
require_once(dirname(__DIR__).'/elements/bookingManagement.php');

?>
</div>


</section>

<?php require_once(dirname(__DIR__).'/elements/footer.php');?>