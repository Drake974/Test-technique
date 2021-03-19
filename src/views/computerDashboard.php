<?php require_once(dirname(__DIR__).'/elements/header.php');?>


<section class="row">

<div class="col">

<?php

require_once(dirname(__DIR__).'/models/showComputer.php');
require_once(dirname(__DIR__).'/elements/modal/registerComputer.php');
require_once(dirname(__DIR__).'/elements/modal/editComputer.php');
require_once(dirname(__DIR__).'/elements/modal/deleteComputer.php');
require_once(dirname(__DIR__).'/elements/computerManagement.php');

?>
</div>


</section>

<?php require_once(dirname(__DIR__).'/elements/footer.php');?>