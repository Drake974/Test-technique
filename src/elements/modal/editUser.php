<!-- Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editUserModal">Modifier un  utilisateur</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" method="POST">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="lastNameUserEdit" placeholder="Nom" required>
            <label for="lastNameUserEdit">Nom*</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="firstNameUserEdit" placeholder="Prénom" required>
            <label for="firstNameUserEdit">Prénom*</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="floatingUserEdit" placeholder="00000" required>
            <label for="floatingUserEdit">N° d'inscription*</label>
        </div>
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