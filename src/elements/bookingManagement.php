
<h2 class="text-center">Gestion des réservations</h2>

<div class="d-flex  mb-4 mt-4">
<form action="" method="POST">
<div class="form-floating mb-3">
            <input type="number" class="form-control" id="floatingComputer" placeholder="0000" required name="user_show">
            <label for="floatingComputer">Numéro*</label>
        </div>
        <button type="submit" class="btn btn-primary" name="show_user">Afficher</button>
        </div>
</form>
<div>

<table class="table">
  <thead>
    <tr>
      <th scope="col" class="text-center">Nom</th>
      <th scope="col" class="text-center">Prénom</th>
      <th scope="col" class="text-center">N° d'inscription</th>
      
      
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
<form action="../models/bookingAddManagement.php" method="POST">
  <input type="hidden" name="booking_user_id" value="<?php 
  if(isset($_POST["show_user"])){
    foreach($resultats as $resultat){
    echo(htmlspecialchars($resultat->id_utilisateurs));
    }};?>"> 
    <div class="form-floating mb-3">
      <input type="date" class="form-control form-date" id="floatingInput" placeholder="00/00/0000" name="date_poste" required>
      <label for="floatingInput">Choisir votre date</label>
    </div>
    
    <select class="form-select form-date" aria-label="select" name="time_date" required>
  
  <option value="8h-9h">8h-9h</option>
  <option value="8h-9h">9h-10h</option>
  <option value="8h-9h">10h-11h</option>
  <option value="8h-9h">11h-12h</option>
  <option value="8h-9h">13h-14h</option>
  <option value="8h-9h">14h-15h</option>
  <option value="8h-9h">15h-16h</option>
  <option value="8h-9h">16h-17h</option>
</select>
    <select class="form-select form-date" aria-label="select" name="id_poste" required>
    <?php foreach($freeComputers as $freeComputer):?>
                <option value="<?= htmlspecialchars($freeComputer->id_postes); ?>">Poste n° <?= htmlspecialchars($freeComputer->numero_poste); ?></option>
                <?php endforeach; ?>
            </select>
            
            
    
    <button type="submit" class="btn btn-primary" name="booking_choose">Reserver</button>
    
  </form>
  </div>
</div>
<!-- tableau de gestion -->
<table class="table">
  <thead>
    <tr>
      <th scope="col" class="text-center">Nom</th>
      <th scope="col" class="text-center">Prénom</th>
      <th scope="col" class="text-center">N° d'inscription</th>
      <th scope="col" class="text-center">Gestion</th>
      
    </tr>
  </thead>
  <tbody>
  <?php ?>
    <tr>

      <td scope="row" class="text-center"></td>
      <td class="text-center"></td>
      <td class="text-center"></td>
      <td class="text-center">

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#<?= "deleteUserModal_" . htmlspecialchars($utilisateur->id_utilisateurs); ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
  <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
</svg>
</button>
</td>
 
    </tr>
    <?php ?> 
  </tbody>
</table>



