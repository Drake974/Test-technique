<?php require_once(dirname(__DIR__).'/controllers/session/session.php'); ?>
<?php require_once(dirname(__DIR__).'/elements/header.php');?>
<div class="row">
<div class="col">

<div class="d-flex justify-content-center mt-5">
    <form action="../models/loginConnect.php" method="POST" class="form-login border shadow p-4" id="loginPage">
    <?php if(isset($_SESSION['flash'])):?>
        <?php if($_SESSION['flash'][0] == "Success"):?>
        <div class="alert alert-success"><?= $_SESSION['flash'][2] ?></div>
        <?php else:?>
        <div class="alert alert-danger"><?= $_SESSION['flash'][2] ?></div>
        <?php endif;?>
        <?php endif;?>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingLastName" placeholder="Nom" required name="identity">
            <label for="floatingLastName">Identifiant*</label>
        </div>
        
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingLogin" placeholder="****" required name="password">
            <label for="floatingLogin">Mot de passe*</label>
        </div>
        <p>* Obligatoire</p>
        <div  class="text-center">
        <button type="submit" class="btn btn-warning form-date" name="register_login" id="loginConnect">Se connecter</button>
        </div>
        
    </form>
</div>

</div>
</div>
<?php require_once(dirname(__DIR__).'/elements/footer.php');?>
<script>
//login
document.getElementById('loginConnect').addEventListener("click", (e)=>{  
    e.preventDefault();
    //Verification du login
    loginPage();
    if ($('#loginPage').valid()){ 
        document.getElementById('loginPage').submit();
    };   
});
</script>

<?php require_once(dirname(__DIR__).'/elements/end.php');?>