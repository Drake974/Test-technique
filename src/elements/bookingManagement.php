<section>
<h2 class="text-center">Gestion des réservations</h2>
<div>
<form class="d-flex" action="../models/showUser.php" method="POST">
  <input class="form-control me-2 form-date" type="search" placeholder="Identifiant" aria-label="Search" name="search_user">
  <button class="btn btn-outline-success" type="submit" >Afficher</button>
</form>
</div>


<div class="d-flex  mb-4 mt-4">

<div>
  <form action="" method="GET" id="dateChoose" class="d-flex">

  <p>Nom:</p>
<p>Prénom:</p>
<p>N°:</p>

    <div class="form-floating mb-3">
      <input type="date" class="form-control form-date" id="floatingInput" placeholder="00/00/0000" name="date_poste" required>
      <label for="floatingInput">Choisir votre date</label>
    </div>
    
    <select class="form-select form-date" aria-label="select" name="id_poste" required>
    <?php foreach($freeComputers as $freeComputer):?>
                <option value="<?= htmlspecialchars($freeComputer->id_postes); ?>">Poste n° <?= htmlspecialchars($freeComputer->numero_poste); ?></option>
                <?php endforeach; ?>
            </select>
            
            
    
    <button type="submit" class="btn btn-primary" name="booking_choose">reserver</button>
    
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