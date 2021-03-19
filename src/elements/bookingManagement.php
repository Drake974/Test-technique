
<h2 class="text-center mb-5">Gestion des réservations</h2>

<!-- recherche par l'identifiant -->
<div class="d-flex justify-content-around mb-4">
<form action="" method="POST" class="bg-light p-2 rounded">
  <div class="mb-4 mt-4">
    <div class="form-floating mb-3">
      <input type="number" class="form-control form-date" id="floatingIdentity" placeholder="0000" required name="user_show">
      <label for="floatingIdentity">Identifiant*</label>
    </div>
    <p class="mb-1">*Obligatoire</p>
    <div class="d-flex justify-content-center">
      <button type="submit" class="btn btn-warning form-bouton" name="show_user">Afficher</button>
      </div>
  </div>
</form>

<form action="../models/bookingAddManagement.php" method="POST" class="bg-light p-2 rounded">
  <input type="hidden" name="booking_user_id" value="<?php 
    if(isset($_POST["show_user"])){
    foreach($resultats as $resultat){
    echo(htmlspecialchars($resultat->id_utilisateurs));
    }};?>"> 
  <div class="form-floating mb-3">
    <input type="date" class="form-control form-date" id="floatingInput" placeholder="00/00/0000" name="date_poste" required>
    <label for="floatingInput">Choisir la date</label>
  </div>
  <!-- selection de l'horaire   -->
  <select class="form-select form-date" aria-label="select" name="time_date" required> 
    <option value="8H-9H">8H-9H</option>
    <option value="8H-9H">9H-10H</option>
    <option value="8H-9H">10H-11H</option>
    <option value="8h-9H">11H-12H</option>
    <option value="8H-9H">13H-14H</option>
    <option value="8H-9H">14H-15h</option>
    <option value="8H-9H">15H-16H</option>
    <option value="8H-9H">16H-17H</option>
  </select>
  
  <!-- selection du poste -->
  <select class="form-select form-date mb-2 mt-2" aria-label="select" name="id_poste" required>
    <?php foreach($freeComputers as $freeComputer):?>
      <option value="<?= htmlspecialchars($freeComputer->id_postes); ?>">Poste n° <?= htmlspecialchars($freeComputer->numero_poste); ?></option>
    <?php endforeach; ?>
  </select>
  <!-- bouton pour reserver -->
  <button type="submit" class="btn btn-warning form-bouton" name="booking_choose">Reserver</button>
    
</form>
</div>


<?php if(isset($_POST["show_user"]) and !$resultats){
  echo('<p class=text-center>Cette identifiant n\'est pas enregistré</p>');
};?>
<div>
<!-- tableau d'affichage à partir de l'identifiant -->
<div  class="form-tables">
  <table class="table table-striped table-responsive">
    <thead>
      <tr>
        <th scope="col" class="text-center">Nom</th>
        <th scope="col" class="text-center">Prénom</th>
        <th scope="col" class="text-center">Numéro d'inscription</th>
      </tr>
    </thead>
    <tbody>
      <?php if(isset($_POST["show_user"])):?>
        <?php foreach($resultats as $resultat):?>
          <tr>
            <td scope="row" class="text-center"><?= htmlspecialchars($resultat->nom_utilisateur); ?></td>
            <td class="text-center"><?= htmlspecialchars($resultat->prenom_utilisateur); ?></td>
            <td class="text-center"><?= htmlspecialchars($resultat->numero_utilisateur); ?></td>
          </tr>
        <?php endforeach; ?>
      <?php endif;?>
    </tbody>
  </table>
</div>

</div>
<!-- ////////////////////////////////////////////////////////////// -->
<h2 class="text-center mt-5 mb-5">Liste des réservations</h2>
<div class="d-flex justify-content-around mb-4">
<form action="" method="POST" class="bg-light p-2 rounded">
<div class="form-floating mb-3">
    <input type="date" class="form-control form-date" id="floatingDateUser" placeholder="00/00/0000" name="date_show" required>
    <label for="floatingDateUSer">Choisir la date</label>
  </div>
  <!-- selection de l'horaire   -->
  <select class="form-select form-date mb-2" aria-label="select" name="time_date_show" required> 
    <option value="8H-9H">8H-9H</option>
    <option value="8H-9H">9H-10H</option>
    <option value="8H-9H">10H-11H</option>
    <option value="8H-9H">11H-12H</option>
    <option value="8H-9H">13H-14H</option>
    <option value="8H-9H">14H-15H</option>
    <option value="8H-9H">15H-16H</option>
    <option value="8H-9H">16H-17H</option>
  </select>
  <!-- selection du poste -->
  <select class="form-select form-date mb-2 mt-2" aria-label="select" name="id_poste_show" required>
    <?php foreach($freeComputers as $freeComputer):?>
      <option value="<?= htmlspecialchars($freeComputer->id_postes); ?>">Poste n° <?= htmlspecialchars($freeComputer->numero_poste); ?></option>
    <?php endforeach; ?>
  </select>
  <!-- bouton pour reserver -->
  <button type="submit" class="btn btn-warning form-bouton" name="booking_show_register">Afficher</button>
    
</form>
<form action="" method="POST" class="ms-5 bg-light p-2 rounded">
  <div class="mb-4 mt-4">
    <div class="form-floating mb-3">
      <input type="number" class="form-control form-date" id="floatingIdentityUser" placeholder="0000" required name="select_identity_user">
      <label for="floatingIdentityUser">Identifiant*</label>
    </div>
    <p class="mb-1">*Obligatoire</p>
    
      <button type="submit" class="btn btn-warning form-bouton" name="select_identity">Afficher</button>
      
  </div>
</form>
</div>

<div class="form-tables mb-5  table-responsive">
<!-- tableau de gestion -->
<table class="table table-striped">
  <thead>
    <tr>
    <th scope="col" class="text-center">Date</th>
    <th scope="col" class="text-center">Horaire</th>
    <th scope="col" class="text-center">Poste</th>
      <th scope="col" class="text-center">Nom</th>
      <th scope="col" class="text-center">Prénom</th>
      <th scope="col" class="text-center">Numéro d'inscription</th>
      <th scope="col" class="text-center">Gestion</th> 
    </tr>
  </thead>
  <tbody>
  <?php ?>
  <?php if(isset($_POST["booking_show_register"]) or isset($_POST["select_identity"])):?>
    <?php foreach($users as $user):?>
    <tr>
      <td scope="row" class="text-center"><?= (new DateTime(htmlspecialchars($user->date).'00:00:00'))->format('d/m/Y')?></td>
      <td class="text-center"><?= htmlspecialchars($user->horaire); ?></td>
      <td class="text-center"><?= htmlspecialchars($user->numero_poste); ?></td>
      <td class="text-center"><?= htmlspecialchars($user->nom_utilisateur); ?></td>
      <td class="text-center"><?= htmlspecialchars($user->prenom_utilisateur); ?></td>
      <td class="text-center"><?= htmlspecialchars($user->numero_utilisateur); ?></td>
      <td class="text-center">
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#<?= "deleteBookingrModal_". htmlspecialchars($user->id_creneaux);?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
  <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
</svg>
</button>
</td>

    </tr>
    <?php endforeach;?>
    <?php endif;?></td>
    <?php ?> 
  </tbody>
</table>
</div>




