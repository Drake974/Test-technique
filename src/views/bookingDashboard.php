<?php require_once(dirname(__DIR__).'/controllers/session/session.php'); ?>
<?php require_once(dirname(__DIR__).'/elements/header.php');?>
<?php require_once(dirname(__DIR__).'/models/bookingShowManagement.php');
require_once(dirname(__DIR__).'/models/bookingManagement.php');
require_once(dirname(__DIR__).'/models/showComputer.php');
?>

<section class="row">

<div class="col">

<?php

require_once(dirname(__DIR__).'/elements/modal/registerAdd.php');
require_once(dirname(__DIR__).'/elements/modal/deleteBooking.php');
require_once(dirname(__DIR__).'/elements/bookingManagement.php');

?>
</div>


</section>

<?php require_once(dirname(__DIR__).'/elements/footer.php');?>
<script>
//afficher
document.getElementById('show_user_register').addEventListener("click", (e)=>{  
    e.preventDefault();
    //Verification 
    showUsers();
    if ($('#formUserRegister').valid()){ 
        document.getElementById('formUserRegister').submit();
    };   
});

//reserver
document.getElementById('btnBookingChoose').addEventListener("click", (e)=>{  
    e.preventDefault();
    //Verification
    userBooking();
    if ($('#formDateRegister').valid()){ 
        document.getElementById('formDateRegister').submit();
    };   
});

//afficher par date
document.getElementById('showBooking').addEventListener("click", (e)=>{  
    e.preventDefault();
    //Verification 
    showDateBooking();
    if ($('#formDateBooking').valid()){ 
        document.getElementById('formDateBooking').submit();
    };   
});

//afficher par identifiant
document.getElementById('showRegisterBtn').addEventListener("click", (e)=>{  
    e.preventDefault();
    //Verification 
    showBooking();
    if ($('#formIdentitySelect').valid()){ 
        document.getElementById('formIdentitySelect').submit();
    };   
});

</script>
<?php require_once(dirname(__DIR__).'/elements/end.php');?>