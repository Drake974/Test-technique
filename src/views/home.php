<?php require_once(dirname(__DIR__).'/controllers/session/session.php'); ?>
<?php require_once(dirname(__DIR__).'/elements/header.php');?>
<?php require_once(dirname(__DIR__).'/models/showHome.php');?>
<?php require_once(dirname(__DIR__).'/models/showComputer.php');?>

<div class="bg-header d-flex justify-content-center align-items-center">
  <div class="bg-title">
<h1 class="bg-light rounded fw-bold display-1 p-5">CENTRE CULTUREL</h1>
</div>
</div>
<h2 class="text-center">Consulter votre réservation</h2>
<p class="text-center fw-bold h5 mt-5">Il y a actuellement <?php echo htmlspecialchars($nbComputers['nb_poste']);?><span class="text-green"> <?php if($nbComputers['nb_poste'] == 0){ echo("poste");}else{echo("postes");}?></span> dans le centre culturel</p>
    

<div class="row">
    <div class="col">
        <div class="d-flex flex-wrap justify-content-around mb-4 mt-4 flex-wrap text-center">
            <form action="" method="post" id="homeDateChoose" class="bg-light p-2 rounded">
              <p class="text-center">Consulter par date</p>
                <div class="form-floating  mb-4 mt-3">
                    <input type="date" class="form-control form-date" id="floatingHome" placeholder="00/00/0000"
                        name="search_date" required min="<?php echo date("Y-m-d"); ?>" value="<?php echo date("Y-m-d"); ?>">
                    <label for="floatingHome">Choisir la date*</label>
                </div>
                <p class="mb-1">*Obligatoire</p>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-warning form-bouton" name="home_date_choose"
                        id="home_date">Rechercher</button>
                </div>
            </form>
            <!-- recherche par l'identifiant -->
              
            <form action="" method="POST" class="bg-light p-2 rounded" id="homeIdentity">
            <p class="text-center">Consulter avec votre identifiant</p>
                <div class="mb-4 mt-4">
                    <div class="form-floating mb-4">
                        <input type="number" class="form-control form-date" id="floatingChoose" placeholder="0000"
                            required name="user_identity">
                        <label for="floatingChoose">Identifiant*</label>
                    </div>
                    <p class="mb-1">*Obligatoire</p>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-warning form-bouton" name="show_register"
                            id="show_register">Afficher</button>
                    </div>
                    <?php if(isset($_POST["show_register"]) and !$users){
                      echo('<p class="text-center">Aucune réservation</p>');
                    };?>
                </div>
            </form>
        </div>
        <?php if(isset($_POST["home_date_choose"]) and !$users){
                      echo('<p class="text-center fw-bold h3">Aucune réservation</p>');
                    };?>
        <div class="table-responsive form-tables mb-5">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">Date</th>
                        <th scope="col" class="text-center">Heure</th>
                        <th scope="col" class="text-center">Poste réserver</th>
                        <th scope="col" class="text-center">Inscrit</th>

                    </tr>
                </thead>
                <tbody>
                    <?php if(isset($_POST["home_date_choose"]) or isset($_POST["show_register"])):?>
                    <?php foreach($users as $user):?>
                    <tr>
                        <td scope="row" class="text-center">
                            <?= (new DateTime(htmlspecialchars($user->date).'00:00:00'))->format('d/m/Y')?>
                        </td>
                        <td scope="row" class="text-center">
                            <?= htmlspecialchars($user->horaire); ?>
                        </td>


                        <td class="text-center"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                fill="currentColor" class="bi bi-laptop-fill text-danger" viewBox="0 0 16 16">
                                <path
                                    d="M2.5 2A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2h-11zM0 12.5h16a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5z" />
                            </svg>
        </div>n°
        <?= htmlspecialchars($user->numero_poste); ?>
        </td>
        <td scope="row" class="text-center">
            <?= htmlspecialchars($user->numero_utilisateur); ?>
        </td>

        </tr>
        <?php endforeach;?>
        <?php endif;?>
        </tbody>
        </table>
  </div>
</div>



<?php require_once(dirname(__DIR__).'/elements/footer.php');?>
<script>
    //recherche par date
    document.getElementById('home_date').addEventListener("click", (e) => {
        // e.preventDefault();
        homeDate();
        if ($('#homeDateChoose').valid()) {
            document.getElementById('homeDateChoose').submit();
        };
    });
    //recherche par identifiant
    document.getElementById('show_register').addEventListener("click", (e) => {
        // e.preventDefault();
        homeIdentity();
        if ($('#homeIdentity').valid()) {
            document.getElementById('homeIdentity').submit();
        };
    });
</script>
<?php require_once(dirname(__DIR__).'/elements/end.php');?>