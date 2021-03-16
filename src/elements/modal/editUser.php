<!-- Modal -->
<?php foreach($utilisateurs as $utilisateur):?>
<div class="modal fade" id="<?= "editUserModal_" . htmlspecialchars($utilisateur->id_utilisateurs); ?>" tabindex="-1" aria-labelledby="editUserModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      
        <h5 class="modal-title" id="editUserModal">Modifier un  utilisateur</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="../models/editUser.php" method="POST">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="lastNameUserEdit" placeholder="Nom" required value="<?= htmlspecialchars($utilisateur->nom_utilisateur); ?>" name="last_name_edit">
            <label for="lastNameUserEdit">Nom*</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="firstNameUserEdit" placeholder="Prénom" required value="<?= htmlspecialchars($utilisateur->prenom_utilisateur); ?>" name="first_name_edit">
            <label for="firstNameUserEdit">Prénom*</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="floatingUserEdit" placeholder="00000" required value="<?= htmlspecialchars($utilisateur->numero_utilisateur); ?>" name="number_edit">
            <label for="floatingUserEdit">N° d'inscription*</label>
        </div>
        <input type="hidden" value="<?= htmlspecialchars($utilisateur->id_utilisateurs);?>" name="id_utilisateurs">
        <p>* Obligatoire</p>
        <div  class="text-center">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-primary" name="edit_user">Modifier</button>
        </div>
        
     </form>
        
      </div>
      
    </div>
  </div>
</div>
<?php endforeach; ?> 