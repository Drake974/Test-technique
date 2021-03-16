<!-- Modal -->
<?php foreach($utilisateurs as $utilisateur):?>
<div class="modal fade" id="<?= "deleteUserModal_" . htmlspecialchars($utilisateur->id_utilisateurs); ?>" tabindex="-1" aria-labelledby="deleteUserModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteUserModal">Supprimer un  utilisateur</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p>Nom: <?= htmlspecialchars($utilisateur->nom_utilisateur); ?></p>
      <p>Prénom: <?= htmlspecialchars($utilisateur->prenom_utilisateur); ?></p>
      <p>N°: <?= htmlspecialchars($utilisateur->numero_utilisateur); ?></p>
      <form action="../models/deleteUser.php" method="POST">
      <input type="hidden" value="<?= htmlspecialchars($utilisateur->id_utilisateurs);?>" name="id_utilisateurs_delete">
        <div  class="text-center">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-primary" name="delete_user">Supprimer</button>
        </div>
     </form>
        
      </div>
      
    </div>
  </div>
</div>
<?php endforeach; ?>