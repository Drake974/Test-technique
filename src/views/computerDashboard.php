<?php require_once(dirname(__DIR__).'/controllers/session/session.php'); ?>
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
<script>
//modal ajout ordinateur
document.getElementById('btnAddComputer').addEventListener("click", (e)=>{  
    e.preventDefault();
    //Verification
    addComputer();
    if ($('#addComputer').valid()){ 
        document.getElementById('addComputer').submit();
    };   
});
//modal modification
document.getElementById('btnEditComputer').addEventListener("click", (e)=>{  
    e.preventDefault();
    //Verification 
    editComputer();
    if ($('#editComputerModal').valid()){ 
        document.getElementById('editComputerModal').submit();
    };   
});

</script>
<?php require_once(dirname(__DIR__).'/elements/end.php');?>