<section>
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
<form action="" method="POST">
  <input type="hidden" name="booking_user_id" value="<?php 
  if(isset($_POST["show_user"])){
    foreach($resultats as $resultat){
    echo(htmlspecialchars($resultat->id_utilisateur));
    }};?>"> 
    <div class="form-floating mb-3">
      <input type="date" class="form-control form-date" id="floatingInput" placeholder="00/00/0000" name="date_poste" required>
      <label for="floatingInput">Choisir votre date</label>
    </div>
    
    <select class="form-select form-date" aria-label="select" name="id_poste" required>
    <?php foreach($freeComputers as $freeComputer):?>
                <option value="<?= htmlspecialchars($freeComputer->id_postes); ?>">Poste n° <?= htmlspecialchars($freeComputer->numero_poste); ?></option>
                <?php endforeach; ?>
            </select>
            
            
    
    <button type="submit" class="btn btn-primary" name="booking_choose">Reserver</button>
    
  </form>
  </div>
</div>
</section>


<section>
<table class="table form-table table-striped">
  <thead>
    <tr>
      
      <th scope="col" class="text-center">Heure</th>
      
      <th colspan="4"  scope="col" class="text-center">Ajouter un utilisateur</th>
      
    </tr>
  </thead>
  <tbody>
  <?php foreach($timeTables as $timeTable):?>
    <?php var_dump($timeTables);?>
    <tr>
      <td scope="row" class="text-center"></td>
      
      <td colspan="4" class="text-center"><!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bookingModal">
  Reserver
</button></td>
      
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</section>