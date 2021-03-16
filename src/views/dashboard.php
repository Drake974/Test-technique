<?php require_once('../elements/header.php');?>


<section class="row">
<div class="col-md-2 col-sm-12 dashboard d-flex flex-column justify-content-center align-items-center">

<form action="" method="post">
<button type="submit" class="btn btn-info mt-4" name="user_management">Gestions des utilisateurs</button>
</form>
<form action="" method="post">
<button type="submit" class="btn btn-info mt-4" name="computer_management">Gestion des ordinateurs</button>
</form>
<form action="" method="post">
<button type="submit" class="btn btn-info mt-4" name="booking_management">Ajouter une réservation</button>
</form>
<form action="" method="post">
<button type="submit" class="btn btn-info mt-4 mb-4" name="visual_management">Liste des réservations</button>
</form>
</div>
<div class="col-md-10 col-sm-12">

<?php
if(!isset($_POST["user_management"]) && !isset($_POST["computer_management"]) && !isset($_POST["booking_management"]) && !isset($_POST["visual_management"])){
    echo("<h2 class=\"text-center mt-5\">Centre de gestion</h2>");
}; 
if(isset($_POST["user_management"])){
    require_once('../models/showUser.php');
    require_once('../elements/modal/registerUser.php');
    require_once('../elements/modal/deleteUser.php');
    require_once('../elements/modal/editUser.php');
    require_once('../elements/userManagement.php');
};
if(isset($_POST["computer_management"])){
    require_once('../elements/modal/registerComputer.php');
    require_once('../elements/modal/editComputer.php');
    require_once('../elements/modal/deleteComputer.php');
    require_once('../elements/computerManagement.php');
};
if(isset($_POST["booking_management"])){
    require_once('../elements/modal/registerAdd.php');
    require_once('../elements/bookingManagement.php');
} else if(isset($_POST["booking_choose"])) {
    require_once('../elements/modal/registerAdd.php');
    require_once('../elements/bookingManagement.php');
};
if(isset($_POST["visual_management"])){
    
    require_once('../elements/visualManagement.php');
} else  if(isset($_POST["date_choose"])){
    require_once('../elements/visualManagement.php');
};
?>
</div>


</section>

<?php require_once('../elements/footer.php');?>