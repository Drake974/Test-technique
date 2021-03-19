
<?php if(isset($_POST["booking_show_register"])):?>
<?php foreach($users as $user):?>
<div class="modal fade" id="<?= "deleteBookingrModal_". htmlspecialchars($user->id_creneaux);?>" tabindex="-1" aria-labelledby="deleteBooking" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteBookingModal">Supprimer la réservation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p>Date: <?= (new DateTime(htmlspecialchars($user->date).'00:00:00'))->format('d/m/Y')?></p>
      <p>Horaire: <?= htmlspecialchars($user->horaire); ?></p>
      <p>Poste N°: <?= htmlspecialchars($user->numero_poste); ?></p>
      <p>Nom: <?= htmlspecialchars($user->nom_utilisateur); ?></p>
      <p>Prénom: <?= htmlspecialchars($user->prenom_utilisateur); ?></p>
      <p>Numéro d'inscription:: <?= htmlspecialchars($user->numero_utilisateur); ?></p>
      <form action="../models/deleteBooking.php" method="POST">
      <input type="hidden" value="<?= htmlspecialchars($user->id_creneaux);?>" name="id_booking_delete">

        <div  class="text-center">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-primary" name="delete_booking" >Supprimer</button>
        </div>
        
     </form>
        
      </div>
      
    </div>
  </div>
</div>
<?php endforeach; ?>
<?php endif; ?>
