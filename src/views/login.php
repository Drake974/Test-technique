
<?php require_once(dirname(__DIR__).'/elements/header.php');?>
<div class="row">
<div class="col">
<section>
<div class="d-flex justify-content-center mt-5">
    <form action="../models/loginConnect.php" method="POST" class="form-login border shadow p-4">
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
        <button type="submit" class="btn btn-warning form-date" name="register_login">Se connecter</button>
        </div>
        
    </form>
</div>
</section>
</div>
</div>
<?php require_once(dirname(__DIR__).'/elements/footer.php');