<!-- Modal -->
<div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteUserModal">Supprimer un  utilisateur</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p>Nom:</p>
      <p>Prénom:</p>
      <p>N°:</p>
      <form action="" method="POST">
      <input type="hidden" class="form-control">
        <div  class="text-center">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-primary" name="delete_user">Supprimer</button>
        </div>
     </form>
        
      </div>
      
    </div>
  </div>
</div>