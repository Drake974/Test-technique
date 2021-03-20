
<?php require_once(dirname(__DIR__).'/controllers/session/session.php'); ?>

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
<script>
//ajout de l'utisateur modal
document.getElementById('modalAddRegister').addEventListener("click", (e)=>{  
    e.preventDefault();
    //Verification du login
    addUser();
    if ($('#modalAddUser').valid()){ 
        document.getElementById('modalAddUser').submit();
    };   
});
//modal modification
document.getElementById('btnEditRegister').addEventListener("click", (e)=>{  
    e.preventDefault();
    //Verification du login
    editUser();
    if ($('#modalEditUser').valid()){ 
        document.getElementById('modalEditUser').submit();
    };   
});
</script>
<?php require_once(dirname(__DIR__).'/elements/end.php');?>