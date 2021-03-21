<?php require_once(dirname(__DIR__).'/controllers/session/session.php'); ?>
<?php require_once(dirname(__DIR__).'/elements/header.php');?>
<?php require_once(dirname(__DIR__).'/models/showHome.php');?>

<h1 class="text-center">CENTRE CULTUREL</h1>

<div class="row">
    <div class="col">
        <div class="d-flex justify-content-around mb-4 mt-4 flex-wrap">
            <form action="" method="post" id="homeDateChoose" class="bg-light p-2 rounded">
                <div class="form-floating  mb-4 mt-3">
                    <input type="date" class="form-control form-date" id="floatingHome" placeholder="00/00/0000"
                        name="search_date" required>
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
  echo('<p class=text-center>Aucune réservation</p>');
};?>
                </div>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">Date</th>
                        <th scope="col" class="text-center">Heure</th>
                        <th scope="col" class="text-center">Poste reserver</th>
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